    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="counter-box white r-5 p-3">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-person text-light-blue s-48"></span>
                                </div>
                                <div class="counter-title text-center">
                                <p style="font-size:25px;font-weight:bold;">Profile</p>
                               <div class="row">
                                 <?php 
               if (isset($message))
               {
                    echo $message;
               }
               ?>    
                               <form action="<?php echo base_url() ?>doprofile" method="POST">
                       <div class="row text-center">
                       <?php 

if($customer_bio_data->num_rows() === 1){

    $customer = $customer_bio_data->row_array();
    $customer_id = $customer['customer_id'];
    $customer_dateofbirth  = $customer['customer_dateofbirth'];
    $customer_postal_address  = $customer['customer_postal_address'];
    $customer_country   = $customer['customer_country'];
    $customer_firstname  = $customer['customer_firstname'];
    $customer_lastname  = $customer['customer_lastname'];
    $customer_town  = $customer['customer_town'];
    $customer_region_state  = $customer['customer_region_state'];
    $customer_postal_code  = $customer['customer_postal_code'];
    $customer_telephone  = $customer['customer_telephone'];
    $customer_telephone2  = $customer['customer_telephone2'];
}

                       ?>
                           
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-person"></i></span>
</div>
 <input type="text" placeholder="Firstname" name="firstname" class="form-control " value="<?php if(isset($customer_firstname)) echo $customer_firstname; ?>"  />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-person"></i></span>
</div>
 <input type="text" placeholder="Lastname" name="lastname" class="form-control " value="<?php if(isset($customer_lastname)) echo $customer_lastname; ?>"  />
</div>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-calendar"></i></span>
</div>
   <input type="text" value="<?php if(isset($customer_dateofbirth)) echo $customer_dateofbirth; ?>" placeholder="Date of birth" name="dateofbirth" class="date-time-picker form-control" data-options="{&quot;timepicker&quot;:false, &quot;format&quot;:&quot;d-m-Y&quot;}">
</div>
<div class="help-block with-errors"></div>
</div>
</div>


<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-home"></i></span>
</div>
   <input type="text" value="<?php if(isset($customer_postal_address)) echo $customer_postal_address; ?>" name="postaladdress" class="form-control "
                                  placeholder="Postal Address">
</div>
<div class="help-block with-errors"></div>
</div>
</div>


<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="flaticon-globe"></i></span>
</div>
   
                                  <?php 
                                  if($customer_country !='')
                                  {
                                      $selected = $customer_country;
                                  }
                                  else
                                  {
                                      $selected = "Select";
                                  }
                                  $options = array(
                                    $selected => $selected,
                                    'Afghanistan'=>'Afghanistan',  
                                    'Albania'=>'Albania',
                                    'Algeria'=>'Algeria',
                                    'American Samoa'=>'American Samoa',
                                    'Andorra'=>'Andorra',
                                    'Angola'=>'Angola',
                                    'Anguilla'=>'Anguilla',
                                    'Antigua and Barbuda'=>'Antigua and Barbuda',
                                    'Argentina'=>'Argentina',
                                    'Armenia'=>'Armenia',
                                    'Aruba'=>'Aruba',
                                    'Australia'=>'Australia',
                                    'Austria'=>'Austria',
                                    'Azerbaijan'=>'Azerbaijan',
                                    'Bahamas'=>'Bahamas',
                                    'Bahrain'=>'Bahrain',
                                    'Bangladesh'=>'Bangladesh',
                                    'Barbados'=>'Barbados',
                                    'Belarus'=>'Belarus',
                                    'Belgium'=>'Belgium',
                                    'Belize'=>'Belize',
                                    'Benin'=>'Benin',
                                    'Bermuda'=>'Bermuda',
                                    'Bhutan'=>'Bhutan',
                                    'Bolivia'=>'Bolivia',
                                    'Bosnia-Herzegovina'=>'Bosnia-Herzegovina',
                                    'Botswana'=>'Botswana',
                                    'Bouvet Island'=>'Bouvet Island',
                                    'Brazil'=>'Brazil',
                                    'Brunei'=>'Brunei',
                                    'Bulgaria'=>'Bulgaria',
                                    'Burkina Faso'=>'Burkina Faso',
                                    'Burundi'=>'Burundi',
                                    'Cambodia'=>'Cambodia',
                                    'Cameroon'=>'Cameroon',
                                    'Canada'=>'Canada',
                                    'Cape Verde'=>'Cape Verde',
                                    'Cayman Islands'=>'Cayman Islands',
                                    'Central African Republic'=>'Central African Republic',
                                    'Chad'=>'Chad',
                                    'Chile'=>'Chile',
                                    'China'=>'China',
                                    'Christmas Island'=>'Christmas Island',
                                    'Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands',
                                    'Colombia'=>'Colombia',
                                    'Comoros'=>'Comoros',
                                    'Democratic Republic of the Congo (Zaire)'=>'Democratic Republic of the Congo (Zaire)',
                                    'Republic of Congo'=>'Republic of Congo',
                                    'Cook Islands'=>'Cook Islands',
                                    'Costa Rica'=>'Costa Rica',
                                    'Croatia'=>'Croatia',
                                    'Cuba'=>'Cuba',
                                    'Cyprus'=>'Cyprus',
                                    'Czech Republic'=>'Czech Republic',
                                    'Denmark'=>'Denmark',
                                    'Djibouti'=>'Djibouti',
                                    'Dominica'=>'Dominica',
                                    'Dominican Republic'=>'Dominican Republic',
                                    'Ecuador'=>'Ecuador',
                                    'Egypt'=>'Egypt',
                                    'El Salvador'=>'El Salvador',
                                    'Equatorial Guinea'=>'Equatorial Guinea',
                                    'Eritrea'=>'Eritrea',
                                    'Estonia'=>'Estonia',
                                    'Ethiopia'=>'Ethiopia',
                                    'Falkland Islands'=>'Falkland Islands',
                                    'Faroe Islands'=>'Faroe Islands',
                                    'Fiji'=>'Fiji',
                                    'Finland'=>'Finland',
                                    'France'=>'France',
                                    'French Guiana'=>'French Guiana',
                                    'Gabon'=>'Gabon',
                                    'Gambia'=>'Gambia',
                                    'Georgia'=>'Georgia',
                                    'Germany'=>'Germany',
                                    'Ghana'=>'Ghana',
                                    'Gibraltar'=>'Gibraltar',
                                    'Greece'=>'Greece',
                                    'Greenland'=>'Greenland',
                                    'Grenada'=>'Grenada',
                                    'Guadeloupe (French)'=>'Guadeloupe (French)',
                                    'Guam (USA)'=>'Guam (USA)',
                                    'Guatemala'=>'Guatemala',
                                    'Guinea'=>'Guinea',
                                    'Guinea Bissau'=>'Guinea Bissau',
                                    'Guyana'=>'Guyana',
                                    'Haiti'=>'Haiti',
                                    'Holy See'=>'Holy See',
                                    'Honduras'=>'Honduras',
                                    'Hong Kong'=>'Hong Kong',
                                    'Hungary'=>'Hungary',
                                    'Iceland'=>'Iceland',
                                    'India'=>'India',
                                    'Indonesia'=>'Indonesia',
                                    'Iran'=>'Iran',
                                    'Iraq'=>'Iraq',
                                    'Ireland'=>'Ireland',
                                    'Israel'=>'Israel',
                                    'Italy'=>'Italy',
                                    'Cote D`Ivoire'=>'Cote D`Ivoire',
                                    'Jamaica'=>'Jamaica',
                                    'Japan'=>'Japan',
                                    'Jordan'=>'Jordan',
                                    'Kazakhstan'=>'Kazakhstan',
                                    'Kenya'=>'Kenya',
                                    'Kiribati'=>'Kiribati',
                                    'Kuwait'=>'Kuwait',
                                    'Kyrgyzstan'=>'Kyrgyzstan',
                                    'Laos'=>'Laos',
                                    'Latvia'=>'Latvia',
                                    'Lebanon'=>'Lebanon',
                                    'Lesotho'=>'Lesotho',
                                    'Liberia'=>'Liberia',
                                    'Libya'=>'Libya',
                                    'Liechtenstein'=>'Liechtenstein',
                                    'Lithuania'=>'Lithuania',
                                    'Luxembourg'=>'Luxembourg',
                                    'Macau'=>'Macau',
                                    'Macedonia'=>'Macedonia',
                                    'Madagascar'=>'Madagascar',
                                    'Malawi'=>'Malawi',
                                    'Malaysia'=>'Malaysia',
                                    'Maldives'=>'Maldives',
                                    'Mali'=>'Mali',
                                    'Malta'=>'Malta',
                                    'Marshall Islands'=>'Marshall Islands',
                                    'Martinique (French)'=>'Martinique (French)',
                                    'Mauritania'=>'Mauritania',
                                    'Mauritius'=>'Mauritius',
                                    'Mayotte'=>'Mayotte',
                                    'Mexico'=>'Mexico',
                                    'Micronesia'=>'Micronesia',
                                    'Moldova'=>'Moldova',
                                    'Monaco'=>'Monaco',
                                    'Mongolia'=>'Mongolia',
                                    'Montenegro'=>'Montenegro',
                                    'Montserrat'=>'Montserrat',
                                    'Morocco'=>'Morocco',
                                    'Mozambique'=>'Mozambique',
                                    'Myanmar'=>'Myanmar',
                                    'Namibia'=>'Namibia',
                                    'Nauru'=>'Nauru',
                                    'Nepal'=>'Nepal',
                                    'Netherlands'=>'Netherlands',
                                    'Netherlands Antilles'=>'Netherlands Antilles',
                                    'New Caledonia (French)'=>'New Caledonia (French)',
                                    'New Zealand'=>'New Zealand',
                                    'Nicaragua'=>'Nicaragua',
                                    'Niger'=>'Niger',
                                    'Nigeria'=>'Nigeria',
                                    'Niue'=>'Niue',
                                    'Norfolk Island'=>'Norfolk Island',
                                    'North Korea'=>'North Korea',
                                    'Northern Mariana Islands'=>'Northern Mariana Islands',
                                    'Norway'=>'Norway',
                                    'Oman'=>'Oman',
                                    'Pakistan'=>'Pakistan',
                                    'Palau'=>'Palau',
                                    'Panama'=>'Panama',
                                    'Papua New Guinea'=>'Papua New Guinea',
                                    'Paraguay'=>'Paraguay',
                                    'Peru'=>'Peru',
                                    'Philippines'=>'Philippines',
                                    'Pitcairn Island'=>'Pitcairn Island',
                                    'Poland'=>'Poland',
                                    'Polynesia (French)'=>'Polynesia (French)',
                                    'Portugal'=>'Portugal',
                                    'Puerto Rico'=>'Puerto Rico',
                                    'Qatar'=>'Qatar',
                                    'Reunion'=>'Reunion',
                                    'Romania'=>'Romania',
                                    'Russia'=>'Russia',
                                    'Rwanda'=>'Rwanda',
                                    'Saint Helena'=>'Saint Helena',
                                    'Saint Kitts and Nevis'=>'Saint Kitts and Nevis',
                                    'Saint Lucia'=>'Saint Lucia',
                                    'Saint Pierre and Miquelon'=>'Saint Pierre and Miquelon',
                                    'Saint Vincent and Grenadines'=>'Saint Vincent and Grenadines',
                                    'Samoa'=>'Samoa',
                                    'San Marino'=>'San Marino',
                                    'Sao Tome and Principe'=>'Sao Tome and Principe',
                                    'Saudi Arabia'=>'Saudi Arabia',
                                    'Senegal'=>'Senegal',
                                    'Serbia'=>'Serbia',
                                    'Seychelles'=>'Seychelles',
                                    'Sierra Leone'=>'Sierra Leone',
                                    'Singapore'=>'Singapore',
                                    'Slovakia'=>'Slovakia',
                                    'Slovenia'=>'Slovenia',
                                    'Solomon Islands'=>'Solomon Islands',
                                    'Somalia'=>'Somalia',
                                    'South Africa'=>'South Africa',
                                    'South Georgia and South Sandwich Islands'=>'South Georgia and South Sandwich Islands',
                                    'South Korea'=>'South Korea',
                                    'South Sudan'=>'South Sudan',
                                    'Spain'=>'Spain',
                                    'Sri Lanka'=>'Sri Lanka',
                                    'Sudan'=>'Sudan',
                                    'Suriname'=>'Suriname',
                                    'Svalbard and Jan Mayen Islands'=>'Svalbard and Jan Mayen Islands',
                                    'Swaziland'=>'Swaziland',
                                    'Sweden'=>'Sweden',
                                    'Switzerland'=>'Switzerland',
                                    'Syria'=>'Syria',
                                    'Taiwan'=>'Taiwan',
                                    'Tajikistan'=>'Tajikistan',
                                    'Tanzania'=>'Tanzania',
                                    'Thailand'=>'Thailand',
                                    'Timor-Leste (East Timor)'=>'Timor-Leste (East Timor)',
                                    'Togo'=>'Togo',
                                    'Tokelau'=>'Tokelau',
                                    'Tonga'=>'Tonga',
                                    'Trinidad and Tobago'=>'Trinidad and Tobago',
                                    'Tunisia'=>'Tunisia',
                                    'Turkey'=>'Turkey',
                                    'Turkmenistan'=>'Turkmenistan',
                                    'Turks and Caicos Islands'=>'Turks and Caicos Islands',
                                    'Tuvalu'=>'Tuvalu',
                                    'Uganda'=>'Uganda',
                                    'Ukraine'=>'Ukraine',
                                    'United Arab Emirates'=>'United Arab Emirates',
                                    'United Kingdom'=>'United Kingdom',
                                    'United States'=>'United States',
                                    'Uruguay'=>'Uruguay',
                                    'Uzbekistan'=>'Uzbekistan',
                                    'Vanuatu'=>'Vanuatu',
                                    'Venezuela'=>'Venezuela',
                                    'Vietnam'=>'Vietnam',
                                    'Virgin Islands'=>'Virgin Islands',
                                    'Wallis and Futuna Islands'=>'Wallis and Futuna Islands',
                                    'Yemen'=>'Yemen',
                                    'Zambia'=>'Zambia',
                                    'Zimbabwe'=>'Zimbabwe'
                                      );
                            
                            $shirts_on_sale = array('small', 'large');
                            $attributes = 'id="country" name="country" class="form-control"';
                            echo form_dropdown('country', $options, 'selected', $attributes);

                                  ?>
</div>
<div class="help-block with-errors"></div>
</div>
</div>



<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-home"></i></span>
</div>
    <input type="text" name="town" class="form-control "
                                  placeholder="Town" value="<?php if(isset($customer_town)) echo $customer_town; ?>">
</div>
<div class="help-block with-errors"></div>
</div>
</div>



<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-home"></i></span>
</div>
   <input type="text" name="state" class="form-control "
                                  placeholder="Region/State" value="<?php if(isset($customer_region_state)) echo $customer_region_state; ?>">
</div>
<div class="help-block with-errors"></div>
</div>
</div>



<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-home"></i></span>
</div>
    <input type="text" name="postalcode" class="form-control "
                                  placeholder="Postal Code" value="<?php if(isset($customer_postal_code)) echo $customer_postal_code; ?>">
</div>
<div class="help-block with-errors"></div>
</div>
</div>



<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-telephone"></i></span>
</div>
    <input type="text" value="<?php if(isset($customer_telephone)) echo $customer_telephone; ?>" name="telephone1" class="form-control "
                                  placeholder="Telephone 1">
</div>
<div class="help-block with-errors"></div>
</div>
</div>


                               
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group mb-30">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="icon-telephone"></i></span>
</div>
   <input type="text" value="<?php if(isset($customer_telephone)) echo $customer_telephone; ?>" name="telephone1" class="form-control "
                                  placeholder="Telephone 1"><br /><br /> 
</div>
<div class="help-block with-errors"></div>
</div>
</div>                        
                      
                              <div class="col-sm-12 col-md-12 col-lg-12">

<input type="submit" class="btn1 orange-gradient btn-with-image disabled" value="Update Profile">
<div id="msgSubmit"></div>
<div class="clearfix"></div>
</div>
                                



                                  
                                 
                                 
                                 
                   </form>

                   
                               </div>
                            
                            </div>
                                
                            </div>
                           
                        </div>

                        
           
        </div>
    </div>
</div>
