<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// use to process billing agreements
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;
use App\Models\User;
use Auth;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;
    
    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function paypalRedirect(){
        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('App Name Monthly Subscription Agreement')
          ->setDescription('Basic Subscription')
          ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($this->plan_id);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
          // Create agreement
          $agreement = $agreement->create($this->apiContext);

          // Extract approval URL to redirect user
          $approvalUrl = $agreement->getApprovalLink();

          return redirect($approvalUrl);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }

    }

    public function paypalReturn(Request $request){

        $token = $request->token;
        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            
            if(isset($result->id)){
                $user = Auth::user();
                $user->role = 'subscriber';
                $user->paypal = 1;
                $user->paypal_agreement_id = $result->id;
                $user->save();

                echo 'New Subscriber Created and Billed';
            }

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo 'You have either cancelled the request or your session has expired';
        }
    }

    public function getAgreement($id)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/payments/billing-agreements/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: '.$curl_error($ch);
        }

        curl_close($ch);
        return json_response($result, true);
    }

    //Update user details if subscription payment failed/cancelled etc
    public function paypalWebhook(Request $request)
    {
        $body = json_decode(file_get_contents('php://input'));

        $paypal_agreement_id = $body->resource->id;
        $user = User::where('paypal_agreement_id', $paypal_agreement_id)->first();

        if ($user) {
            if ($body->resource->status == 'ACTIVE') {
                $user->paypal = 1;
            }
            else {
                $user->paypal = 0;
            }
            $user->save();
        }
    }
}