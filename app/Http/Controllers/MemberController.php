<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Auth;

class MemberController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            return view('auth.login');
        }
        else {
            if (Auth::user()->paypal == 0) {
                return view('license');
            }
        }

    	$users = User::all()->groupBy('country');

    	$js   = '';
    	foreach ($users as $country) {
    		$text = '';
    		foreach ($country as $key => $user) {
    			$key++;
    			$latitude  = $user->location->latitude;
    			$longitude = $user->location->longitude;
    			if ($key != 1) {
    				$text .= '<hr>';
    			}
    			$text      .= "<b>".$user->nickname."</b><br><a href='/player-card/".$user->id."'>View player card</a>";
    		}
    		$js .=   ' var marker = L.marker(['.$latitude.', '.$longitude.']).bindTooltip("'.$key.'", {permanent:true, direction: "right"}).addTo(map);marker.bindPopup("'.$text.'");';
    	}

    	return view('members')->withUsers($users)->withJs($js);
    }

    public function searchMembers(Request $request)
    {
        if($request->name == null && $request->actor == 'allactors' && $request->country != 'ANY') {
            $users = User::with('permissions')->where('country', $request->country)->where('type', '!=', 'competitionorganiser')->where('type', '!=', 'teamstaff')->where('type', '!=', 'membernation')->get();
        }
        elseif($request->name == null && $request->actor != 'allactors' && $request->country == 'ANY') {
            $users = User::with('permissions')->where('type', $request->actor)->get();
        }
        elseif($request->name != null && $request->actor == 'allactors' && $request->country == 'ANY') {
            $users = User::with('permissions')->where('name', 'like', $request->name)->where('type', '!=', 'competitionorganiser')->where('type', '!=', 'teamstaff')->where('type', '!=', 'membernation')->get();
        }
        elseif($request->name != null && $request->actor != 'allactors' && $request->country == 'ANY') {
            $users = User::with('permissions')->where('name', 'like', $request->name)->where('type', $request->actor)->get();
        }
        elseif($request->name != null && $request->actor == 'allactors' && $request->country != 'ANY') {
            $users = User::with('permissions')->where('name', 'like', $request->name)->where('country', $request->country)->where('type', '!=', 'competitionorganiser')->where('type', '!=', 'teamstaff')->where('type', '!=', 'membernation')->get();
        }
        elseif($request->name == null && $request->actor != 'allactors' && $request->country != 'ANY') {
            $users = User::with('permissions')->where('country', $request->country)->where('type', $request->actor)->get();
        }
        elseif($request->name != null && $request->actor != 'allactors' && $request->country != 'ANY') {
            $users = User::with('permissions')->where('name', 'like', $request->name)->where('country', $request->country)->where('type', $request->actor)->get();
        }
        else {
            $users = User::with('permissions')->where('type', '!=', 'competitionorganiser')->where('type', '!=', 'teamstaff')->where('type', '!=', 'membernation')->get();
        }
        
        foreach ($users as $user) {
            $user->name      = (isset($user->permissions->name)      ? $user->name      : '');
            $user->surname   = (isset($user->permissions->surname)   ? $user->surname   : '');
            $user->birthdate = (isset($user->permissions->birthdate) ? $user->birthdate : 'Hidden');
            $user->city      = (isset($user->permissions->city)      ? $user->city      : '');
            $user->email     = (isset($user->permissions->email)     ? $user->email     : null);    

            if ($user->achievements_approved == 0) {
                $user->achievements = 'Achievements not yet approved by the IEFF.';
            }
            else {
                $user->achievements = $user->achievements.' (All achievements have been verified by the IEFF)';
            }

            if ($user->competing_fifa) {
                $user->fifa = 1;
            }
            else {
                $user->fifa = 0;
            }
            if ($user->competing_pes) {
                $user->pes = 1;
            } 
            else {
                $user->pes = 0;
            }
            if ($user->competing_playstation) {
                $user->playstation = 1;
            }
            else {
                $user->playstation = 0;
            }
            if ($user->competing_xbox) {
                $user->xbox = 1;
            }
            else {
                $user->xbox = 0;
            }

            $user->countrycode = $user->country;

            if($user->country == "AF") { $user->country = "Afghanistan"; }
            if($user->country == "AX") { $user->country = "Aland Islands"; }
            if($user->country == "AL") { $user->country = "Albania"; }
            if($user->country == "DZ") { $user->country = "Algeria"; }
            if($user->country == "AS") { $user->country = "American Samoa"; }
            if($user->country == "AD") { $user->country = "Andorra"; }
            if($user->country == "AO") { $user->country = "Angola"; }
            if($user->country == "AI") { $user->country = "Anguilla"; }
            if($user->country == "AQ") { $user->country = "Antarctica"; }
            if($user->country == "AG") { $user->country = "Antigua And Barbuda"; }
            if($user->country == "AR") { $user->country = "Argentina"; }
            if($user->country == "AM") { $user->country = "Armenia"; }
            if($user->country == "AW") { $user->country = "Aruba"; }
            if($user->country == "AU") { $user->country = "Australia"; }
            if($user->country == "AT") { $user->country = "Austria"; }
            if($user->country == "AZ") { $user->country = "Azerbaijan"; }
            if($user->country == "BS") { $user->country = "Bahamas"; }
            if($user->country == "BH") { $user->country = "Bahrain"; }
            if($user->country == "BD") { $user->country = "Bangladesh"; }
            if($user->country == "BB") { $user->country = "Barbados"; }
            if($user->country == "BY") { $user->country = "Belarus"; }
            if($user->country == "BE") { $user->country = "Belgium"; }
            if($user->country == "BZ") { $user->country = "Belize"; }
            if($user->country == "BJ") { $user->country = "Benin"; }
            if($user->country == "BM") { $user->country = "Bermuda"; }
            if($user->country == "BT") { $user->country = "Bhutan"; }
            if($user->country == "BO") { $user->country = "Bolivia"; }
            if($user->country == "BA") { $user->country = "Bosnia And Herzegovina"; }
            if($user->country == "BW") { $user->country = "Botswana"; }
            if($user->country == "BV") { $user->country = "Bouvet Island"; }
            if($user->country == "BR") { $user->country = "Brazil"; }
            if($user->country == "IO") { $user->country = "British Indian Ocean Territory"; }
            if($user->country == "BN") { $user->country = "Brunei Darussalam"; }
            if($user->country == "BG") { $user->country = "Bulgaria"; }
            if($user->country == "BF") { $user->country = "Burkina Faso"; }
            if($user->country == "BI") { $user->country = "Burundi"; }
            if($user->country == "KH") { $user->country = "Cambodia"; }
            if($user->country == "CM") { $user->country = "Cameroon"; }
            if($user->country == "CA") { $user->country = "Canada"; }
            if($user->country == "CV") { $user->country = "Cape Verde"; }
            if($user->country == "KY") { $user->country = "Cayman Islands"; }
            if($user->country == "CF") { $user->country = "Central African Republic"; }
            if($user->country == "TD") { $user->country = "Chad"; }
            if($user->country == "CL") { $user->country = "Chile"; }
            if($user->country == "CN") { $user->country = "China"; }
            if($user->country == "CX") { $user->country = "Christmas Island"; }
            if($user->country == "CC") { $user->country = "Cocos (Keeling) Islands"; }
            if($user->country == "CO") { $user->country = "Colombia"; }
            if($user->country == "KM") { $user->country = "Comoros"; }
            if($user->country == "CG") { $user->country = "Congo"; }
            if($user->country == "CD") { $user->country = "Congo, Democratic Republic"; }
            if($user->country == "CK") { $user->country = "Cook Islands"; }
            if($user->country == "CR") { $user->country = "Costa Rica"; }
            if($user->country == "CI") { $user->country = "Cote D'Ivoire"; }
            if($user->country == "HR") { $user->country = "Croatia"; }
            if($user->country == "CU") { $user->country = "Cuba"; }
            if($user->country == "CY") { $user->country = "Cyprus"; }
            if($user->country == "CZ") { $user->country = "Czech Republic"; }
            if($user->country == "DK") { $user->country = "Denmark"; }
            if($user->country == "DJ") { $user->country = "Djibouti"; }
            if($user->country == "DM") { $user->country = "Dominica"; }
            if($user->country == "DO") { $user->country = "Dominican Republic"; }
            if($user->country == "EC") { $user->country = "Ecuador"; }
            if($user->country == "EG") { $user->country = "Egypt"; }
            if($user->country == "SV") { $user->country = "El Salvador"; }
            if($user->country == "GQ") { $user->country = "Equatorial Guinea"; }
            if($user->country == "ER") { $user->country = "Eritrea"; }
            if($user->country == "EE") { $user->country = "Estonia"; }
            if($user->country == "ET") { $user->country = "Ethiopia"; }
            if($user->country == "FK") { $user->country = "Falkland Islands (Malvinas)"; }
            if($user->country == "FO") { $user->country = "Faroe Islands"; }
            if($user->country == "FJ") { $user->country = "Fiji"; }
            if($user->country == "FI") { $user->country = "Finland"; }
            if($user->country == "FR") { $user->country = "France"; }
            if($user->country == "GF") { $user->country = "French Guiana"; }
            if($user->country == "PF") { $user->country = "French Polynesia"; }
            if($user->country == "TF") { $user->country = "French Southern Territories"; }
            if($user->country == "GA") { $user->country = "Gabon"; }
            if($user->country == "GM") { $user->country = "Gambia"; }
            if($user->country == "GE") { $user->country = "Georgia"; }
            if($user->country == "DE") { $user->country = "Germany"; }
            if($user->country == "GH") { $user->country = "Ghana"; }
            if($user->country == "GI") { $user->country = "Gibraltar"; }
            if($user->country == "GR") { $user->country = "Greece"; }
            if($user->country == "GL") { $user->country = "Greenland"; }
            if($user->country == "GD") { $user->country = "Grenada"; }
            if($user->country == "GP") { $user->country = "Guadeloupe"; }
            if($user->country == "GU") { $user->country = "Guam"; }
            if($user->country == "GT") { $user->country = "Guatemala"; }
            if($user->country == "GG") { $user->country = "Guernsey"; }
            if($user->country == "GN") { $user->country = "Guinea"; }
            if($user->country == "GW") { $user->country = "Guinea-Bissau"; }
            if($user->country == "GY") { $user->country = "Guyana"; }
            if($user->country == "HT") { $user->country = "Haiti"; }
            if($user->country == "HM") { $user->country = "Heard Island & Mcdonald Islands"; }
            if($user->country == "VA") { $user->country = "Holy See (Vatican City State)"; }
            if($user->country == "HN") { $user->country = "Honduras"; }
            if($user->country == "HK") { $user->country = "Hong Kong"; }
            if($user->country == "HU") { $user->country = "Hungary"; }
            if($user->country == "IS") { $user->country = "Iceland"; }
            if($user->country == "IN") { $user->country = "India"; }
            if($user->country == "ID") { $user->country = "Indonesia"; }
            if($user->country == "IR") { $user->country = "Iran, Islamic Republic Of"; }
            if($user->country == "IQ") { $user->country = "Iraq"; }
            if($user->country == "IE") { $user->country = "Ireland"; }
            if($user->country == "IM") { $user->country = "Isle Of Man"; }
            if($user->country == "IL") { $user->country = "Israel"; }
            if($user->country == "IT") { $user->country = "Italy"; }
            if($user->country == "JM") { $user->country = "Jamaica"; }
            if($user->country == "JP") { $user->country = "Japan"; }
            if($user->country == "JE") { $user->country = "Jersey"; }
            if($user->country == "JO") { $user->country = "Jordan"; }
            if($user->country == "KZ") { $user->country = "Kazakhstan"; }
            if($user->country == "KE") { $user->country = "Kenya"; }
            if($user->country == "KI") { $user->country = "Kiribati"; }
            if($user->country == "KR") { $user->country = "Korea"; }
            if($user->country == "KW") { $user->country = "Kuwait"; }
            if($user->country == "KG") { $user->country = "Kyrgyzstan"; }
            if($user->country == "LA") { $user->country = "Lao People's Democratic Republic"; }
            if($user->country == "LV") { $user->country = "Latvia"; }
            if($user->country == "LB") { $user->country = "Lebanon"; }
            if($user->country == "LS") { $user->country = "Lesotho"; }
            if($user->country == "LR") { $user->country = "Liberia"; }
            if($user->country == "LY") { $user->country = "Libyan Arab Jamahiriya"; }
            if($user->country == "LI") { $user->country = "Liechtenstein"; }
            if($user->country == "LT") { $user->country = "Lithuania"; }
            if($user->country == "LU") { $user->country = "Luxembourg"; }
            if($user->country == "MO") { $user->country = "Macao"; }
            if($user->country == "MK") { $user->country = "Macedonia"; }
            if($user->country == "MG") { $user->country = "Madagascar"; }
            if($user->country == "MW") { $user->country = "Malawi"; }
            if($user->country == "MY") { $user->country = "Malaysia"; }
            if($user->country == "MV") { $user->country = "Maldives"; }
            if($user->country == "ML") { $user->country = "Mali"; }
            if($user->country == "MT") { $user->country = "Malta"; }
            if($user->country == "MH") { $user->country = "Marshall Islands"; }
            if($user->country == "MQ") { $user->country = "Martinique"; }
            if($user->country == "MR") { $user->country = "Mauritania"; }
            if($user->country == "MU") { $user->country = "Mauritius"; }
            if($user->country == "YT") { $user->country = "Mayotte"; }
            if($user->country == "MX") { $user->country = "Mexico"; }
            if($user->country == "FM") { $user->country = "Micronesia, Federated States Of"; }
            if($user->country == "MD") { $user->country = "Moldova"; }
            if($user->country == "MC") { $user->country = "Monaco"; }
            if($user->country == "MN") { $user->country = "Mongolia"; }
            if($user->country == "ME") { $user->country = "Montenegro"; }
            if($user->country == "MS") { $user->country = "Montserrat"; }
            if($user->country == "MA") { $user->country = "Morocco"; }
            if($user->country == "MZ") { $user->country = "Mozambique"; }
            if($user->country == "MM") { $user->country = "Myanmar"; }
            if($user->country == "NA") { $user->country = "Namibia"; }
            if($user->country == "NR") { $user->country = "Nauru"; }
            if($user->country == "NP") { $user->country = "Nepal"; }
            if($user->country == "NL") { $user->country = "Netherlands"; }
            if($user->country == "AN") { $user->country = "Netherlands Antilles"; }
            if($user->country == "NC") { $user->country = "New Caledonia"; }
            if($user->country == "NZ") { $user->country = "New Zealand"; }
            if($user->country == "NI") { $user->country = "Nicaragua"; }
            if($user->country == "NE") { $user->country = "Niger"; }
            if($user->country == "NG") { $user->country = "Nigeria"; }
            if($user->country == "NU") { $user->country = "Niue"; }
            if($user->country == "NF") { $user->country = "Norfolk Island"; }
            if($user->country == "MP") { $user->country = "Northern Mariana Islands"; }
            if($user->country == "NO") { $user->country = "Norway"; }
            if($user->country == "OM") { $user->country = "Oman"; }
            if($user->country == "PK") { $user->country = "Pakistan"; }
            if($user->country == "PW") { $user->country = "Palau"; }
            if($user->country == "PS") { $user->country = "Palestinian Territory, Occupied"; }
            if($user->country == "PA") { $user->country = "Panama"; }
            if($user->country == "PG") { $user->country = "Papua New Guinea"; }
            if($user->country == "PY") { $user->country = "Paraguay"; }
            if($user->country == "PE") { $user->country = "Peru"; }
            if($user->country == "PH") { $user->country = "Philippines"; }
            if($user->country == "PN") { $user->country = "Pitcairn"; }
            if($user->country == "PL") { $user->country = "Poland"; }
            if($user->country == "PT") { $user->country = "Portugal"; }
            if($user->country == "PR") { $user->country = "Puerto Rico"; }
            if($user->country == "QA") { $user->country = "Qatar"; }
            if($user->country == "RE") { $user->country = "Reunion"; }
            if($user->country == "RO") { $user->country = "Romania"; }
            if($user->country == "RU") { $user->country = "Russian Federation"; }
            if($user->country == "RW") { $user->country = "Rwanda"; }
            if($user->country == "BL") { $user->country = "Saint Barthelemy"; }
            if($user->country == "SH") { $user->country = "Saint Helena"; }
            if($user->country == "KN") { $user->country = "Saint Kitts And Nevis"; }
            if($user->country == "LC") { $user->country = "Saint Lucia"; }
            if($user->country == "MF") { $user->country = "Saint Martin"; }
            if($user->country == "PM") { $user->country = "Saint Pierre And Miquelon"; }
            if($user->country == "VC") { $user->country = "Saint Vincent And Grenadines"; }
            if($user->country == "WS") { $user->country = "Samoa"; }
            if($user->country == "SM") { $user->country = "San Marino"; }
            if($user->country == "ST") { $user->country = "Sao Tome And Principe"; }
            if($user->country == "SA") { $user->country = "Saudi Arabia"; }
            if($user->country == "SN") { $user->country = "Senegal"; }
            if($user->country == "RS") { $user->country = "Serbia"; }
            if($user->country == "SC") { $user->country = "Seychelles"; }
            if($user->country == "SL") { $user->country = "Sierra Leone"; }
            if($user->country == "SG") { $user->country = "Singapore"; }
            if($user->country == "SK") { $user->country = "Slovakia"; }
            if($user->country == "SI") { $user->country = "Slovenia"; }
            if($user->country == "SB") { $user->country = "Solomon Islands"; }
            if($user->country == "SO") { $user->country = "Somalia"; }
            if($user->country == "ZA") { $user->country = "South Africa"; }
            if($user->country == "GS") { $user->country = "South Georgia And Sandwich Isl."; }
            if($user->country == "ES") { $user->country = "Spain"; }
            if($user->country == "LK") { $user->country = "Sri Lanka"; }
            if($user->country == "SD") { $user->country = "Sudan"; }
            if($user->country == "SR") { $user->country = "Suriname"; }
            if($user->country == "SJ") { $user->country = "Svalbard And Jan Mayen"; }
            if($user->country == "SZ") { $user->country = "Swaziland"; }
            if($user->country == "SE") { $user->country = "Sweden"; }
            if($user->country == "CH") { $user->country = "Switzerland"; }
            if($user->country == "SY") { $user->country = "Syrian Arab Republic"; }
            if($user->country == "TW") { $user->country = "Taiwan"; }
            if($user->country == "TJ") { $user->country = "Tajikistan"; }
            if($user->country == "TZ") { $user->country = "Tanzania"; }
            if($user->country == "TH") { $user->country = "Thailand"; }
            if($user->country == "TL") { $user->country = "Timor-Leste"; }
            if($user->country == "TG") { $user->country = "Togo"; }
            if($user->country == "TK") { $user->country = "Tokelau"; }
            if($user->country == "TO") { $user->country = "Tonga"; }
            if($user->country == "TT") { $user->country = "Trinidad And Tobago"; }
            if($user->country == "TN") { $user->country = "Tunisia"; }
            if($user->country == "TR") { $user->country = "Turkey"; }
            if($user->country == "TM") { $user->country = "Turkmenistan"; }
            if($user->country == "TC") { $user->country = "Turks And Caicos Islands"; }
            if($user->country == "TV") { $user->country = "Tuvalu"; }
            if($user->country == "UG") { $user->country = "Uganda"; }
            if($user->country == "UA") { $user->country = "Ukraine"; }
            if($user->country == "AE") { $user->country = "United Arab Emirates"; }
            if($user->country == "GB") { $user->country = "United Kingdom"; }
            if($user->country == "US") { $user->country = "United States"; }
            if($user->country == "UM") { $user->country = "United States Outlying Islands"; }
            if($user->country == "UY") { $user->country = "Uruguay"; }
            if($user->country == "UZ") { $user->country = "Uzbekistan"; }
            if($user->country == "VU") { $user->country = "Vanuatu"; }
            if($user->country == "VE") { $user->country = "Venezuela"; }
            if($user->country == "VN") { $user->country = "Viet Nam"; }
            if($user->country == "VG") { $user->country = "Virgin Islands, British"; }
            if($user->country == "VI") { $user->country = "Virgin Islands, U.S."; }
            if($user->country == "WF") { $user->country = "Wallis And Futuna"; }
            if($user->country == "EH") { $user->country = "Western Sahara"; }
            if($user->country == "YE") { $user->country = "Yemen"; }
            if($user->country == "ZM") { $user->country = "Zambia"; }
            if($user->country == "ZW") { $user->country = "Zimbabwe"; }
        }

        if ($users->isEmpty()) {
            return response()->json(['empty' => 'No results found, try a different search']); 
        }

        return response()->json(['success' => $users]);     
    }
}



