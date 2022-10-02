@extends('layouts.frontend')

@section('metatags')
<!-- Primary Meta Tags -->
<title>IEFF — Members</title>
<meta name="title" content="IEFF — Members">
<meta name="description" content="Become a member nation of IEFF today!">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://ie-ff.com/members">
<meta property="og:title" content="IEFF — Members">
<meta property="og:description" content="Become a member nation of IEFF today!">
<meta property="og:image" content="https://ie-ff.com/images/ieff_background.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://ie-ff.com/members">
<meta property="twitter:title" content="IEFF — Members">
<meta property="twitter:description" content="Become a member nation of IEFF today!">
<meta property="twitter:image" content="https://ie-ff.com/images/ieff_background.jpg">
@endsection


@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
  
   <style type="text/css">#map { height: 580px; z-index: 1; }.my-leaflet-map-container img {
    max-height: none;
}</style>
@endsection

@section('title', 'Member Nations')

@section('body')
<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('images/parallax/8.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Members</h1>
		<span>INTERNATIONAL ESPORT FOOTBALL FEDERATION</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Members</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div id="map"></div>

			<form method="POST" class="mt-5" id="members-form" enctype="multipart/form-data">
                @csrf

                    <div class="row">
                        <div class="col-4 form-group">
                            <input id="name members-form-name" type="text" class="form-control name" name="name" placeholder="Name (optional)" required autocomplete="name" autofocus>
                            <small class="name-validation"></small>
                        </div>

                        <div class="col-3 form-group">
                        	<select id="country members-form-country" type="text" class="form-control country" name="country" required autocomplete="country" autofocus>
                                <option value="AF" @if(Auth::user()->country == "AF")selected="selected"@endif>Afghanistan</option>
                                <option value="AX" @if(Auth::user()->country == "AX")selected="selected"@endif>Aland Islands</option>
                                <option value="AL" @if(Auth::user()->country == "AL")selected="selected"@endif>Albania</option>
                                <option value="DZ" @if(Auth::user()->country == "DZ")selected="selected"@endif>Algeria</option>
                                <option value="AS" @if(Auth::user()->country == "AS")selected="selected"@endif>American Samoa</option>
                                <option value="AD" @if(Auth::user()->country == "AD")selected="selected"@endif>Andorra</option>
                                <option value="AO" @if(Auth::user()->country == "AO")selected="selected"@endif>Angola</option>
                                <option value="AI" @if(Auth::user()->country == "AI")selected="selected"@endif>Anguilla</option>
                                <option value="AQ" @if(Auth::user()->country == "AQ")selected="selected"@endif>Antarctica</option>
                                <option value="AG" @if(Auth::user()->country == "AG")selected="selected"@endif>Antigua And Barbuda</option>
                                <option value="AR" @if(Auth::user()->country == "AR")selected="selected"@endif>Argentina</option>
                                <option value="AM" @if(Auth::user()->country == "AM")selected="selected"@endif>Armenia</option>
                                <option value="AW" @if(Auth::user()->country == "AW")selected="selected"@endif>Aruba</option>
                                <option value="AU" @if(Auth::user()->country == "AU")selected="selected"@endif>Australia</option>
                                <option value="AT" @if(Auth::user()->country == "AT")selected="selected"@endif>Austria</option>
                                <option value="AZ" @if(Auth::user()->country == "AZ")selected="selected"@endif>Azerbaijan</option>
                                <option value="BS" @if(Auth::user()->country == "BS")selected="selected"@endif>Bahamas</option>
                                <option value="BH" @if(Auth::user()->country == "BH")selected="selected"@endif>Bahrain</option>
                                <option value="BD" @if(Auth::user()->country == "BD")selected="selected"@endif>Bangladesh</option>
                                <option value="BB" @if(Auth::user()->country == "BB")selected="selected"@endif>Barbados</option>
                                <option value="BY" @if(Auth::user()->country == "BY")selected="selected"@endif>Belarus</option>
                                <option value="BE" @if(Auth::user()->country == "BE")selected="selected"@endif>Belgium</option>
                                <option value="BZ" @if(Auth::user()->country == "BZ")selected="selected"@endif>Belize</option>
                                <option value="BJ" @if(Auth::user()->country == "BJ")selected="selected"@endif>Benin</option>
                                <option value="BM" @if(Auth::user()->country == "BM")selected="selected"@endif>Bermuda</option>
                                <option value="BT" @if(Auth::user()->country == "BT")selected="selected"@endif>Bhutan</option>
                                <option value="BO" @if(Auth::user()->country == "BO")selected="selected"@endif>Bolivia</option>
                                <option value="BA" @if(Auth::user()->country == "BA")selected="selected"@endif>Bosnia And Herzegovina</option>
                                <option value="BW" @if(Auth::user()->country == "BW")selected="selected"@endif>Botswana</option>
                                <option value="BV" @if(Auth::user()->country == "BV")selected="selected"@endif>Bouvet Island</option>
                                <option value="BR" @if(Auth::user()->country == "BR")selected="selected"@endif>Brazil</option>
                                <option value="IO" @if(Auth::user()->country == "IO")selected="selected"@endif>British Indian Ocean Territory</option>
                                <option value="BN" @if(Auth::user()->country == "BN")selected="selected"@endif>Brunei Darussalam</option>
                                <option value="BG" @if(Auth::user()->country == "BG")selected="selected"@endif>Bulgaria</option>
                                <option value="BF" @if(Auth::user()->country == "BF")selected="selected"@endif>Burkina Faso</option>
                                <option value="BI" @if(Auth::user()->country == "BI")selected="selected"@endif>Burundi</option>
                                <option value="KH" @if(Auth::user()->country == "KH")selected="selected"@endif>Cambodia</option>
                                <option value="CM" @if(Auth::user()->country == "CM")selected="selected"@endif>Cameroon</option>
                                <option value="CA" @if(Auth::user()->country == "CA")selected="selected"@endif>Canada</option>
                                <option value="CV" @if(Auth::user()->country == "CV")selected="selected"@endif>Cape Verde</option>
                                <option value="KY" @if(Auth::user()->country == "KY")selected="selected"@endif>Cayman Islands</option>
                                <option value="CF" @if(Auth::user()->country == "CF")selected="selected"@endif>Central African Republic</option>
                                <option value="TD" @if(Auth::user()->country == "TD")selected="selected"@endif>Chad</option>
                                <option value="CL" @if(Auth::user()->country == "CL")selected="selected"@endif>Chile</option>
                                <option value="CN" @if(Auth::user()->country == "CN")selected="selected"@endif>China</option>
                                <option value="CX" @if(Auth::user()->country == "CX")selected="selected"@endif>Christmas Island</option>
                                <option value="CC" @if(Auth::user()->country == "CC")selected="selected"@endif>Cocos (Keeling) Islands</option>
                                <option value="CO" @if(Auth::user()->country == "CO")selected="selected"@endif>Colombia</option>
                                <option value="KM" @if(Auth::user()->country == "KM")selected="selected"@endif>Comoros</option>
                                <option value="CG" @if(Auth::user()->country == "CG")selected="selected"@endif>Congo</option>
                                <option value="CD" @if(Auth::user()->country == "CD")selected="selected"@endif>Congo, Democratic Republic</option>
                                <option value="CK" @if(Auth::user()->country == "CK")selected="selected"@endif>Cook Islands</option>
                                <option value="CR" @if(Auth::user()->country == "CR")selected="selected"@endif>Costa Rica</option>
                                <option value="CI" @if(Auth::user()->country == "CI")selected="selected"@endif>Cote D'Ivoire</option>
                                <option value="HR" @if(Auth::user()->country == "HR")selected="selected"@endif>Croatia</option>
                                <option value="CU" @if(Auth::user()->country == "CU")selected="selected"@endif>Cuba</option>
                                <option value="CY" @if(Auth::user()->country == "CY")selected="selected"@endif>Cyprus</option>
                                <option value="CZ" @if(Auth::user()->country == "CZ")selected="selected"@endif>Czech Republic</option>
                                <option value="DK" @if(Auth::user()->country == "DK")selected="selected"@endif>Denmark</option>
                                <option value="DJ" @if(Auth::user()->country == "DJ")selected="selected"@endif>Djibouti</option>
                                <option value="DM" @if(Auth::user()->country == "DM")selected="selected"@endif>Dominica</option>
                                <option value="DO" @if(Auth::user()->country == "DO")selected="selected"@endif>Dominican Republic</option>
                                <option value="EC" @if(Auth::user()->country == "EC")selected="selected"@endif>Ecuador</option>
                                <option value="EG" @if(Auth::user()->country == "EG")selected="selected"@endif>Egypt</option>
                                <option value="SV" @if(Auth::user()->country == "SV")selected="selected"@endif>El Salvador</option>
                                <option value="GQ" @if(Auth::user()->country == "GQ")selected="selected"@endif>Equatorial Guinea</option>
                                <option value="ER" @if(Auth::user()->country == "ER")selected="selected"@endif>Eritrea</option>
                                <option value="EE" @if(Auth::user()->country == "EE")selected="selected"@endif>Estonia</option>
                                <option value="ET" @if(Auth::user()->country == "ET")selected="selected"@endif>Ethiopia</option>
                                <option value="FK" @if(Auth::user()->country == "FK")selected="selected"@endif>Falkland Islands (Malvinas)</option>
                                <option value="FO" @if(Auth::user()->country == "FO")selected="selected"@endif>Faroe Islands</option>
                                <option value="FJ" @if(Auth::user()->country == "FJ")selected="selected"@endif>Fiji</option>
                                <option value="FI" @if(Auth::user()->country == "FI")selected="selected"@endif>Finland</option>
                                <option value="FR" @if(Auth::user()->country == "FR")selected="selected"@endif>France</option>
                                <option value="GF" @if(Auth::user()->country == "GF")selected="selected"@endif>French Guiana</option>
                                <option value="PF" @if(Auth::user()->country == "PF")selected="selected"@endif>French Polynesia</option>
                                <option value="TF" @if(Auth::user()->country == "TF")selected="selected"@endif>French Southern Territories</option>
                                <option value="GA" @if(Auth::user()->country == "GA")selected="selected"@endif>Gabon</option>
                                <option value="GM" @if(Auth::user()->country == "GM")selected="selected"@endif>Gambia</option>
                                <option value="GE" @if(Auth::user()->country == "GE")selected="selected"@endif>Georgia</option>
                                <option value="DE" @if(Auth::user()->country == "DE")selected="selected"@endif>Germany</option>
                                <option value="GH" @if(Auth::user()->country == "GH")selected="selected"@endif>Ghana</option>
                                <option value="GI" @if(Auth::user()->country == "GI")selected="selected"@endif>Gibraltar</option>
                                <option value="GR" @if(Auth::user()->country == "GR")selected="selected"@endif>Greece</option>
                                <option value="GL" @if(Auth::user()->country == "GL")selected="selected"@endif>Greenland</option>
                                <option value="GD" @if(Auth::user()->country == "GD")selected="selected"@endif>Grenada</option>
                                <option value="GP" @if(Auth::user()->country == "GP")selected="selected"@endif>Guadeloupe</option>
                                <option value="GU" @if(Auth::user()->country == "GU")selected="selected"@endif>Guam</option>
                                <option value="GT" @if(Auth::user()->country == "GT")selected="selected"@endif>Guatemala</option>
                                <option value="GG" @if(Auth::user()->country == "GG")selected="selected"@endif>Guernsey</option>
                                <option value="GN" @if(Auth::user()->country == "GN")selected="selected"@endif>Guinea</option>
                                <option value="GW" @if(Auth::user()->country == "GW")selected="selected"@endif>Guinea-Bissau</option>
                                <option value="GY" @if(Auth::user()->country == "GY")selected="selected"@endif>Guyana</option>
                                <option value="HT" @if(Auth::user()->country == "HT")selected="selected"@endif>Haiti</option>
                                <option value="HM" @if(Auth::user()->country == "HM")selected="selected"@endif>Heard Island & Mcdonald Islands</option>
                                <option value="VA" @if(Auth::user()->country == "VA")selected="selected"@endif>Holy See (Vatican City State)</option>
                                <option value="HN" @if(Auth::user()->country == "HN")selected="selected"@endif>Honduras</option>
                                <option value="HK" @if(Auth::user()->country == "HK")selected="selected"@endif>Hong Kong</option>
                                <option value="HU" @if(Auth::user()->country == "HU")selected="selected"@endif>Hungary</option>
                                <option value="IS" @if(Auth::user()->country == "IS")selected="selected"@endif>Iceland</option>
                                <option value="IN" @if(Auth::user()->country == "IN")selected="selected"@endif>India</option>
                                <option value="ID" @if(Auth::user()->country == "ID")selected="selected"@endif>Indonesia</option>
                                <option value="IR" @if(Auth::user()->country == "IR")selected="selected"@endif>Iran, Islamic Republic Of</option>
                                <option value="IQ" @if(Auth::user()->country == "IQ")selected="selected"@endif>Iraq</option>
                                <option value="IE" @if(Auth::user()->country == "IE")selected="selected"@endif>Ireland</option>
                                <option value="IM" @if(Auth::user()->country == "IM")selected="selected"@endif>Isle Of Man</option>
                                <option value="IL" @if(Auth::user()->country == "IL")selected="selected"@endif>Israel</option>
                                <option value="IT" @if(Auth::user()->country == "IT")selected="selected"@endif>Italy</option>
                                <option value="JM" @if(Auth::user()->country == "JM")selected="selected"@endif>Jamaica</option>
                                <option value="JP" @if(Auth::user()->country == "JP")selected="selected"@endif>Japan</option>
                                <option value="JE" @if(Auth::user()->country == "JE")selected="selected"@endif>Jersey</option>
                                <option value="JO" @if(Auth::user()->country == "JO")selected="selected"@endif>Jordan</option>
                                <option value="KZ" @if(Auth::user()->country == "KZ")selected="selected"@endif>Kazakhstan</option>
                                <option value="KE" @if(Auth::user()->country == "KE")selected="selected"@endif>Kenya</option>
                                <option value="KI" @if(Auth::user()->country == "KI")selected="selected"@endif>Kiribati</option>
                                <option value="KR" @if(Auth::user()->country == "KR")selected="selected"@endif>Korea</option>
                                <option value="KW" @if(Auth::user()->country == "KW")selected="selected"@endif>Kuwait</option>
                                <option value="KG" @if(Auth::user()->country == "KG")selected="selected"@endif>Kyrgyzstan</option>
                                <option value="LA" @if(Auth::user()->country == "LA")selected="selected"@endif>Lao People's Democratic Republic</option>
                                <option value="LV" @if(Auth::user()->country == "LV")selected="selected"@endif>Latvia</option>
                                <option value="LB" @if(Auth::user()->country == "LB")selected="selected"@endif>Lebanon</option>
                                <option value="LS" @if(Auth::user()->country == "LS")selected="selected"@endif>Lesotho</option>
                                <option value="LR" @if(Auth::user()->country == "LR")selected="selected"@endif>Liberia</option>
                                <option value="LY" @if(Auth::user()->country == "LY")selected="selected"@endif>Libyan Arab Jamahiriya</option>
                                <option value="LI" @if(Auth::user()->country == "LI")selected="selected"@endif>Liechtenstein</option>
                                <option value="LT" @if(Auth::user()->country == "LT")selected="selected"@endif>Lithuania</option>
                                <option value="LU" @if(Auth::user()->country == "LU")selected="selected"@endif>Luxembourg</option>
                                <option value="MO" @if(Auth::user()->country == "MO")selected="selected"@endif>Macao</option>
                                <option value="MK" @if(Auth::user()->country == "MK")selected="selected"@endif>Macedonia</option>
                                <option value="MG" @if(Auth::user()->country == "MG")selected="selected"@endif>Madagascar</option>
                                <option value="MW" @if(Auth::user()->country == "MW")selected="selected"@endif>Malawi</option>
                                <option value="MY" @if(Auth::user()->country == "MY")selected="selected"@endif>Malaysia</option>
                                <option value="MV" @if(Auth::user()->country == "MV")selected="selected"@endif>Maldives</option>
                                <option value="ML" @if(Auth::user()->country == "ML")selected="selected"@endif>Mali</option>
                                <option value="MT" @if(Auth::user()->country == "MT")selected="selected"@endif>Malta</option>
                                <option value="MH" @if(Auth::user()->country == "MH")selected="selected"@endif>Marshall Islands</option>
                                <option value="MQ" @if(Auth::user()->country == "MQ")selected="selected"@endif>Martinique</option>
                                <option value="MR" @if(Auth::user()->country == "MR")selected="selected"@endif>Mauritania</option>
                                <option value="MU" @if(Auth::user()->country == "MU")selected="selected"@endif>Mauritius</option>
                                <option value="YT" @if(Auth::user()->country == "YT")selected="selected"@endif>Mayotte</option>
                                <option value="MX" @if(Auth::user()->country == "MX")selected="selected"@endif>Mexico</option>
                                <option value="FM" @if(Auth::user()->country == "FM")selected="selected"@endif>Micronesia, Federated States Of</option>
                                <option value="MD" @if(Auth::user()->country == "MD")selected="selected"@endif>Moldova</option>
                                <option value="MC" @if(Auth::user()->country == "MC")selected="selected"@endif>Monaco</option>
                                <option value="MN" @if(Auth::user()->country == "MN")selected="selected"@endif>Mongolia</option>
                                <option value="ME" @if(Auth::user()->country == "ME")selected="selected"@endif>Montenegro</option>
                                <option value="MS" @if(Auth::user()->country == "MS")selected="selected"@endif>Montserrat</option>
                                <option value="MA" @if(Auth::user()->country == "MA")selected="selected"@endif>Morocco</option>
                                <option value="MZ" @if(Auth::user()->country == "MZ")selected="selected"@endif>Mozambique</option>
                                <option value="MM" @if(Auth::user()->country == "MM")selected="selected"@endif>Myanmar</option>
                                <option value="NA" @if(Auth::user()->country == "NA")selected="selected"@endif>Namibia</option>
                                <option value="NR" @if(Auth::user()->country == "NR")selected="selected"@endif>Nauru</option>
                                <option value="NP" @if(Auth::user()->country == "NP")selected="selected"@endif>Nepal</option>
                                <option value="NL" @if(Auth::user()->country == "NL")selected="selected"@endif>Netherlands</option>
                                <option value="AN" @if(Auth::user()->country == "AN")selected="selected"@endif>Netherlands Antilles</option>
                                <option value="NC" @if(Auth::user()->country == "NC")selected="selected"@endif>New Caledonia</option>
                                <option value="NZ" @if(Auth::user()->country == "NZ")selected="selected"@endif>New Zealand</option>
                                <option value="NI" @if(Auth::user()->country == "NI")selected="selected"@endif>Nicaragua</option>
                                <option value="NE" @if(Auth::user()->country == "NE")selected="selected"@endif>Niger</option>
                                <option value="NG" @if(Auth::user()->country == "NG")selected="selected"@endif>Nigeria</option>
                                <option value="NU" @if(Auth::user()->country == "NU")selected="selected"@endif>Niue</option>
                                <option value="NF" @if(Auth::user()->country == "NF")selected="selected"@endif>Norfolk Island</option>
                                <option value="MP" @if(Auth::user()->country == "MP")selected="selected"@endif>Northern Mariana Islands</option>
                                <option value="NO" @if(Auth::user()->country == "NO")selected="selected"@endif>Norway</option>
                                <option value="OM" @if(Auth::user()->country == "OM")selected="selected"@endif>Oman</option>
                                <option value="PK" @if(Auth::user()->country == "PK")selected="selected"@endif>Pakistan</option>
                                <option value="PW" @if(Auth::user()->country == "PW")selected="selected"@endif>Palau</option>
                                <option value="PS" @if(Auth::user()->country == "PS")selected="selected"@endif>Palestinian Territory, Occupied</option>
                                <option value="PA" @if(Auth::user()->country == "PA")selected="selected"@endif>Panama</option>
                                <option value="PG" @if(Auth::user()->country == "PG")selected="selected"@endif>Papua New Guinea</option>
                                <option value="PY" @if(Auth::user()->country == "PY")selected="selected"@endif>Paraguay</option>
                                <option value="PE" @if(Auth::user()->country == "PE")selected="selected"@endif>Peru</option>
                                <option value="PH" @if(Auth::user()->country == "PH")selected="selected"@endif>Philippines</option>
                                <option value="PN" @if(Auth::user()->country == "PN")selected="selected"@endif>Pitcairn</option>
                                <option value="PL" @if(Auth::user()->country == "PL")selected="selected"@endif>Poland</option>
                                <option value="PT" @if(Auth::user()->country == "PT")selected="selected"@endif>Portugal</option>
                                <option value="PR" @if(Auth::user()->country == "PR")selected="selected"@endif>Puerto Rico</option>
                                <option value="QA" @if(Auth::user()->country == "QA")selected="selected"@endif>Qatar</option>
                                <option value="RE" @if(Auth::user()->country == "RE")selected="selected"@endif>Reunion</option>
                                <option value="RO" @if(Auth::user()->country == "RO")selected="selected"@endif>Romania</option>
                                <option value="RU" @if(Auth::user()->country == "RU")selected="selected"@endif>Russian Federation</option>
                                <option value="RW" @if(Auth::user()->country == "RW")selected="selected"@endif>Rwanda</option>
                                <option value="BL" @if(Auth::user()->country == "BL")selected="selected"@endif>Saint Barthelemy</option>
                                <option value="SH" @if(Auth::user()->country == "SH")selected="selected"@endif>Saint Helena</option>
                                <option value="KN" @if(Auth::user()->country == "KN")selected="selected"@endif>Saint Kitts And Nevis</option>
                                <option value="LC" @if(Auth::user()->country == "LC")selected="selected"@endif>Saint Lucia</option>
                                <option value="MF" @if(Auth::user()->country == "MF")selected="selected"@endif>Saint Martin</option>
                                <option value="PM" @if(Auth::user()->country == "PM")selected="selected"@endif>Saint Pierre And Miquelon</option>
                                <option value="VC" @if(Auth::user()->country == "VC")selected="selected"@endif>Saint Vincent And Grenadines</option>
                                <option value="WS" @if(Auth::user()->country == "WS")selected="selected"@endif>Samoa</option>
                                <option value="SM" @if(Auth::user()->country == "SM")selected="selected"@endif>San Marino</option>
                                <option value="ST" @if(Auth::user()->country == "ST")selected="selected"@endif>Sao Tome And Principe</option>
                                <option value="SA" @if(Auth::user()->country == "SA")selected="selected"@endif>Saudi Arabia</option>
                                <option value="SN" @if(Auth::user()->country == "SN")selected="selected"@endif>Senegal</option>
                                <option value="RS" @if(Auth::user()->country == "RS")selected="selected"@endif>Serbia</option>
                                <option value="SC" @if(Auth::user()->country == "SC")selected="selected"@endif>Seychelles</option>
                                <option value="SL" @if(Auth::user()->country == "SL")selected="selected"@endif>Sierra Leone</option>
                                <option value="SG" @if(Auth::user()->country == "SG")selected="selected"@endif>Singapore</option>
                                <option value="SK" @if(Auth::user()->country == "SK")selected="selected"@endif>Slovakia</option>
                                <option value="SI" @if(Auth::user()->country == "SI")selected="selected"@endif>Slovenia</option>
                                <option value="SB" @if(Auth::user()->country == "SB")selected="selected"@endif>Solomon Islands</option>
                                <option value="SO" @if(Auth::user()->country == "SO")selected="selected"@endif>Somalia</option>
                                <option value="ZA" @if(Auth::user()->country == "ZA")selected="selected"@endif>South Africa</option>
                                <option value="GS" @if(Auth::user()->country == "GS")selected="selected"@endif>South Georgia And Sandwich Isl.</option>
                                <option value="ES" @if(Auth::user()->country == "ES")selected="selected"@endif>Spain</option>
                                <option value="LK" @if(Auth::user()->country == "LK")selected="selected"@endif>Sri Lanka</option>
                                <option value="SD" @if(Auth::user()->country == "SD")selected="selected"@endif>Sudan</option>
                                <option value="SR" @if(Auth::user()->country == "SR")selected="selected"@endif>Suriname</option>
                                <option value="SJ" @if(Auth::user()->country == "SJ")selected="selected"@endif>Svalbard And Jan Mayen</option>
                                <option value="SZ" @if(Auth::user()->country == "SZ")selected="selected"@endif>Swaziland</option>
                                <option value="SE" @if(Auth::user()->country == "SE")selected="selected"@endif>Sweden</option>
                                <option value="CH" @if(Auth::user()->country == "CH")selected="selected"@endif>Switzerland</option>
                                <option value="SY" @if(Auth::user()->country == "SY")selected="selected"@endif>Syrian Arab Republic</option>
                                <option value="TW" @if(Auth::user()->country == "TW")selected="selected"@endif>Taiwan</option>
                                <option value="TJ" @if(Auth::user()->country == "TJ")selected="selected"@endif>Tajikistan</option>
                                <option value="TZ" @if(Auth::user()->country == "TZ")selected="selected"@endif>Tanzania</option>
                                <option value="TH" @if(Auth::user()->country == "TH")selected="selected"@endif>Thailand</option>
                                <option value="TL" @if(Auth::user()->country == "TL")selected="selected"@endif>Timor-Leste</option>
                                <option value="TG" @if(Auth::user()->country == "TG")selected="selected"@endif>Togo</option>
                                <option value="TK" @if(Auth::user()->country == "TK")selected="selected"@endif>Tokelau</option>
                                <option value="TO" @if(Auth::user()->country == "TO")selected="selected"@endif>Tonga</option>
                                <option value="TT" @if(Auth::user()->country == "TT")selected="selected"@endif>Trinidad And Tobago</option>
                                <option value="TN" @if(Auth::user()->country == "TN")selected="selected"@endif>Tunisia</option>
                                <option value="TR" @if(Auth::user()->country == "TR")selected="selected"@endif>Turkey</option>
                                <option value="TM" @if(Auth::user()->country == "TM")selected="selected"@endif>Turkmenistan</option>
                                <option value="TC" @if(Auth::user()->country == "TC")selected="selected"@endif>Turks And Caicos Islands</option>
                                <option value="TV" @if(Auth::user()->country == "TV")selected="selected"@endif>Tuvalu</option>
                                <option value="UG" @if(Auth::user()->country == "UG")selected="selected"@endif>Uganda</option>
                                <option value="UA" @if(Auth::user()->country == "UA")selected="selected"@endif>Ukraine</option>
                                <option value="AE" @if(Auth::user()->country == "AE")selected="selected"@endif>United Arab Emirates</option>
                                <option value="GB" @if(Auth::user()->country == "GB")selected="selected"@endif>United Kingdom</option>
                                <option value="US" @if(Auth::user()->country == "US")selected="selected"@endif>United States</option>
                                <option value="UM" @if(Auth::user()->country == "UM")selected="selected"@endif>United States Outlying Islands</option>
                                <option value="UY" @if(Auth::user()->country == "UY")selected="selected"@endif>Uruguay</option>
                                <option value="UZ" @if(Auth::user()->country == "UZ")selected="selected"@endif>Uzbekistan</option>
                                <option value="VU" @if(Auth::user()->country == "VU")selected="selected"@endif>Vanuatu</option>
                                <option value="VE" @if(Auth::user()->country == "VE")selected="selected"@endif>Venezuela</option>
                                <option value="VN" @if(Auth::user()->country == "VN")selected="selected"@endif>Viet Nam</option>
                                <option value="VG" @if(Auth::user()->country == "VG")selected="selected"@endif>Virgin Islands, British</option>
                                <option value="VI" @if(Auth::user()->country == "VI")selected="selected"@endif>Virgin Islands, U.S.</option>
                                <option value="WF" @if(Auth::user()->country == "WF")selected="selected"@endif>Wallis And Futuna</option>
                                <option value="EH" @if(Auth::user()->country == "EH")selected="selected"@endif>Western Sahara</option>
                                <option value="YE" @if(Auth::user()->country == "YE")selected="selected"@endif>Yemen</option>
                                <option value="ZM" @if(Auth::user()->country == "ZM")selected="selected"@endif>Zambia</option>
                                <option value="ZW" @if(Auth::user()->country == "ZW")selected="selected"@endif>Zimbabwe</option>
                            </select>
                        </div>

                        <div class="col-3 form-group">
                            <select id="country members-form-actor" type="text" class="form-control actor" name="actor" required autocomplete="actor" autofocus>
								<option value="allactors">Show all</option>
								<option value="players">Players only</option>
								<option value="adminref">Admins/refs only</option>
								<option value="membernation">Member nations only</option>
								<option value="competitionorganiser">Competition organisers only</option>
								<option value="teamstaff">Team Staff only</option>
							</select>
                        </div>
						
						<div class="col-2 form-group">
                            <button type="submit" class="button btn-block button-3d button-black m-0" id="members-form-submit" name="members-form-submit" value="search">Search</button>
                        </div>

                    </div>

                </form>

                <div class="row results">
	                
	            </div>
		</div>
	</div>
</section>

@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

<script type="text/javascript">
// initialize Leaflet
var map = L.map('map').setView({lon: 0, lat: 0}, 2);

// add the OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
}).addTo(map);

{!! $js !!}

</script>

<script type="text/javascript">
    $("#members-form-submit").on('click', function(e) {
    // Make sure that the form isn't actually being sent.
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            data: $('#members-form').serialize(),
            url: "{{ route('searchmembers') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) 
            {
                if(data.validation) 
                {
                    jQuery.each(data.validation, function(key, value){
                        jQuery('.'+key).addClass('is-invalid');
                        jQuery('.'+key+'-validation').append('<small class="text-danger validation-error"> - '+value+'</small>');
                    });
                    toastr.warning('Check the form and try again.');
                }
                else if(data.error)
                {
                    toastr.warning(data.error);
                }
                else if(data.empty)
                {
                    toastr.warning(data.empty);
                }
                else 
                {
                    $('.form-control').attr('class','form-control is-valid');
                    $('.validation-error').removeClass();
                    $('.results').empty();

                    jQuery.each(data.success, function(key, value){
                        jQuery('.results').append('<div class="col-6"><table class="table table-bordered table-striped"><tbody><tr><td>Type</td><td>'+value['type']+'</td></tr><tr><td>Name</td><td>'+value['name']+'</td></tr><tr><td>Surname</td><td>'+value['surname']+'</td></tr><tr><td>Nickname</td><td>'+value['nickname']+'</td></tr><tr><td>Birth Date</td><td>'+value['birthdate']+'</td></tr><tr><td>Country</td><td>'+value['country']+'</td></tr><tr><td>City</td><td>'+value['city']+'</td></tr><tr><td>Email</td><td>'+value['email']+'</td></tr><tr><td>Consoles</td><td>'+value['consoles']+'</td></tr><tr><td>Games</td><td>'+value['games']+'</td></tr></tbody></table></div>');
                    });
                }
            },
            error: function (data) {
                toastr.warning('An unknown error occured. Refresh the page and try again.');
            }
        });
    });
</script>
@endsection