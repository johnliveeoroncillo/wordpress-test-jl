<style>
/**
* TODO: Create SCSS file
*/
.card {
    border: 1px solid rgb(18 17 39 / 12%);
    border-radius: 12px;
    padding: 32px 24px 49px 24px;
    background-color: #fff;
    max-width: 670px;
    margin-left: auto;
    overflow: hidden;
}

.card .card-header {
    background: transparent;
    background-color: transparent;
    padding: 0;
    border: 0;
    margin-bottom: 2rem;
}

.card .card-body {
    padding: 0;
}

.card .card-header .card-title {
    border-bottom: 1px solid #bdbdbd94;
}

.card .card-title {
    margin-bottom: 0;
    font-family: 'Exo 2';
    font-weight: 800;
    font-size: 14px;
    line-height: 11px;
    letter-spacing: 1px;
    color: #333333;
    text-transform: uppercase;
    padding-bottom: 12px;
}

.card .card-body .form-control {
    /* border: 1px solid #828282; */    
    padding: 12px;  
    color: #333333;
    font-weight: 800;
    font-size: 16px;
    line-height: 22px;
}
.card .card-body .form-group > .form-control {
    border-radius: 6px;
}

.SumoSelect {
    width: 100%;
}

.float {
    z-index: 1;
}

.contact_number:before,
.optional_contact_number:before {
    content: '+63';
    position: absolute;
    color: #333333;
    font-weight: 800;
    font-size: 16px;
    line-height: 23px;
    padding: 12px;
}

input[name="contact_number"],
input[name="optional_contact_number"] {
    padding-left: 48px !important;
}
.optWrapper label {
    padding-left: 0 !important;
}

/* .card .card-body select.form-control {
    min-height: 48px;    
}

select {
    background: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.0456 7.39919L0.249369 1.91778C-0.316391 1.2712 0.142787 0.259277 1.00195 0.259277H10.5944C11.4536 0.259277 11.9127 1.2712 11.347 1.91778L6.55075 7.39919C6.15234 7.85452 5.44401 7.85452 5.0456 7.39919Z' fill='%233A3A3C'/%3E%3C/svg%3E%0A") no-repeat right #ddd;
    -webkit-appearance: none;
    background-position-x: calc(100% - 20px);
} */

/* .card .card-body .form-control:hover {
    border-color: #DC3C54;
} */


.card .card-body .form-group {
    position: relative;
    margin-bottom: 2.6rem;
}

.card .card-body .form-group.condensed {
    margin-bottom: 1rem;
}

.card .card-body .form-group label.float:not(.form-check-label)  {
    margin-bottom: 0;
    background-color: white;
    position: absolute;
    font-weight: 300;
    font-size: 14px;
    line-height: 22px;
    display: flex;
    align-items: center;
    letter-spacing: 0.1px;
    color: #333333;
    top: -10px;
    left: 8px;
    padding: 0 5px;
}

.card .card-body .form-group label:not(.float):not(.form-check-label):not(.custom-control-label) {
    font-weight: 800;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.1px;
    color: #222222;
    padding-left: 14px;
    margin-bottom: 14px;
    display: block;
}

.card .card-body .form-group label.form-check-label, .card .card-body .form-group .custom-control-label  {
    font-weight: 300;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.1px;
    color: #222222;
}

.card .card-body .form-group input[type="radio"]  {
    width: 20px;
    height: 20px;
    position: relative;
    accent-color: #DC3C54;
}

.card .card-body .form-group .custom-control-label {
    padding-left: 8px;
}

.card .card-body .row {
    margin-left: -12px !important;
    margin-right: -12px !important;
}

.card .card-body .row > div {
    padding-left: 12px !important;
    padding-right: 12px !important;
}

.custom-control-label::before, 
.custom-control-label::after {
    top: .6rem;
    width: 20px;
    height: 20px;
}

.custom-checkbox .custom-control-label::before {
    border-radius: 5px;
    background: #fff;
    border: 1px solid #A5AFC0;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    background-color: #DC3C54;
    border: 0;
}

.custom-control {
    margin-left: 0.5rem;
}

.card .card-body .form-check  {
    display: inline-flex;
    flex-direction: row;
    gap: 5px;
    padding-left: 0.8rem;
    margin-bottom: 1rem;
}

.card .card-body .upload-container {
    height: 216px;
    border: 1px dashed #828282;
    border-radius: 5px;
    margin-left: 15px;
    display: grid;
    place-items: center;
    cursor: pointer;
    position: relative;
}

.card .card-body button {
    min-width: 367px;
}

.card .card-body .upload-container .upload-default {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 34px;
}

.card .card-body .upload-container .upload-default span {
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    text-align: center;
    color: #828282;
}

.card .card-body .upload-container .upload-preview {
    position: absolute;
    width: 100%;
    height: 95%;
    top: 50%;
    transform: translateY(-50%);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

.modal {
    background-color: #0000008a;
}

#buy-now-modal .modal-content {
    border-radius: 24px;
    min-width: 400px;
    max-width: 604px;
    overflow: hidden;
}

#buy-now-modal .modal-content .modal-body {
    text-align: center;
    padding: 32px 38px 50px 38px;
}

#buy-now-modal .modal-content .modal-body .card-title {
    font-family: 'Exo 2';
    font-style: normal;
    font-weight: 800;
    font-size: 40px;
    color: #222222;
    margin-bottom: 24px;
}

#buy-now-modal .modal-content .modal-body p {
    font-weight: 300;
    font-size: 16px;
    color: #4F4F4F;
    margin-bottom: 0.6rem;
}

#buy-now-modal .modal-content .modal-body p.ref {
    font-weight: 700;
    color: #222222;
    font-size: 20px;
    margin-bottom: 1.2rem;
}

#buy-now-modal .modal-content .modal-body button {
    font-size: 16px;
    font-weight: 700;
    padding: 12px 0;
    width: 100%;
    max-width: 400px;
}

label a {
    color: #005CEE;
}

.card .card-body .form-group label.float:not(.form-check-label)  {
    margin-bottom: 0;
    background-color: white;
    position: absolute;
    font-weight: 300;
    font-size: 14px;
    line-height: 22px;
    display: flex;
    align-items: center;
    letter-spacing: 0.1px;
    color: #333333;
    top: -10px;
    left: 8px;
    padding: 0 5px;
}

.card .card-body .form-group label.error {
    margin-left: 0;
    padding-left: 0;
    text-align: right;
    font-weight: 400 !important;
    color: #FC5555;
    margin-top: 4px;
    font-size: 12px !important;
    margin-bottom: 0 !important;
    position: absolute;
    right: 0;
}

.card .card-body .form-group.form-error label {
    color: #FC5555 !important;
}

.card .card-body .form-group .form-control.error, .card .card-body .form-group.form-error .custom-checkbox .custom-control-label::before {
    border-color: #FC5555 !important;
    color: #FC5555;
}

.card .card-body .form-control::placeholder {
    color: #8282823d;
    font-weight: 500 !important;
}

.overlay {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    opacity: 0.4;
    background-color: #222;
    z-index: 2;
}
</style>

<?php
    $car_slug = get_query_var('buy-car');    

    $post = get_page_by_path($car_slug, OBJECT, 'carleader-listing');
    $post_id = (isset($post->ID))? $post->ID : '';
    $parent_car = get_post_meta($post_id, 'car_variant_parent_car', true);
    $models = [];
    $parent_id = $parent_car;

    if(!empty($parent_id)) {
        $post = get_post($parent_id);
        $color = get_post_meta($post_id, 'car_variant_color', true);
        // if($color == $_POST['car_color']) {
            $models[] = [
                'name' => $post->post_title,
                'slug' => $post->post_name,
            ];
        // }
    } else {
        $parent_id = $post_id;
    }

    $posts = get_posts(
        array(
            'post_type' => 'carleader-listing',
            'meta_key' => 'car_variant_parent_car',  
            'meta_value' => $parent_id,
        )
    );        
    $car_variants = array_map(function ($post) {                
        $color = get_post_meta($post->ID, 'car_variant_color', true);        
        $post = get_post($post->ID);
        return $models[] = [
            'name' => $post->post_title,
            'slug' => $post->post_name,
        ];      
    }, $posts);    
    $models = array_merge($models, $car_variants);        
    if(empty($models)) {
        $models[] = [
            'name' => $post->post_title,
            'slug' => $post->post_name,
        ];
    }
?>


<div class="card">
    <div class="overlay" style="display: none;"></div>
    <div class="card-header">
        <h3 class="card-title">Personal Information</h3>
    </div>
    <div class="card-body">
        <form id="buy-now">
            <input type="hidden" name="car_slug" value="<?= get_query_var('buy-car') ?>">
            <div class="row">
                <div class="col-12">
                    <div class="form-group tt-skinSelect-01">
                        <label class="float">Variant</label>                    
                        <select name="variant" id="variant" class="tt-select tt-skin-01 SumoUnder w-100">
                            <?php foreach($models as $model): ?>
                                <option value="<?= $model['slug'] ?>" <?= ($model['slug'] === $car_slug)? 'selected' : '' ?>><?= $model['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="float">First name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter first name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="float">Last name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter last name" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email address" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group contact_number">
                        <label class="float">Contact number</label>
                        <input type="number" name="contact_number" class="form-control" placeholder="9XXXXXXXXX" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group optional_contact_number">
                        <label class="float">Alternative contact number (optional) </label>
                        <input type="number" name="optional_contact_number" class="form-control" placeholder="9XXXXXXXXX" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="float">Preffered date to Visit</label>
                        <input type="text" name="preffered_date" class="form-control" placeholder="mm/dd/yyyy" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group tt-skinSelect-01">
                        <label class="float">Time to visit</label>
                        <select name="time" id="time" class="tt-select tt-skin-01 SumoUnder w-100">
                            <?php
                                $auto_time = (isset($_GET['time']) ? $_GET['time'] : '');
                                $time_array = array();
                                $time = CARSADA_TIME;
                                if (!empty($time)) {
                                    $times = explode(',', $time);
                                    if (!empty($times)) $time_array = $times;
                                }
                            ?>
                            <?php if (!empty($time_array)) : ?>
                                <?php foreach($time_array as $value) : ?>
                                    <option class="text-center" value="<?= $value ?>:00"><?= $value ?>:00</option>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option class="text-center" value="9:00">9:00</option>
                                <option class="text-center" value="10:00">10:00</option>
                                <option class="text-center" value="11:00">11:00</option>
                                <option class="text-center" value="1:00">1:00</option>
                                <option class="text-center" value="2:00">2:00</option>
                            <?php endif ?>
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group tt-skinSelect-01">
                        <label class="float">AM/PM</label>
                        <select name="twelve_hours_clock" id="twelve_hours_clock" class="tt-select tt-skin-01 SumoUnder w-100">
                            <option class="text-center" value="AM">AM</option>
                            <option class="text-center" value="PM">PM</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter address" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Citizenship</label>
                        <input type="text" name="citizenship" class="form-control" placeholder="Enter citizenship" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed mt-3">
                        <label class="font-16px">To continue your loan, you must agree to the following:</label>

                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="tnc" id="tnc">
                            <label class="custom-control-label" for="tnc">I agree to the <a href="" target="_blank">Terms and Conditions</a> of Carsada. I understand that the collection and use of this data by
                                917Ventures (which owns and operates Carsada), which may include personal information and sensitive
                                personal information, shall be in accordance with the <a href="" target="_blank">Data Privacy Act of 2012</a> and the <a href="" target="_blank">Privacy Policy of
                                917Ventures</a>.</label>
                        </div>

                        <div class="custom-control form-control-lg custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="globe" id="globe">
                            <label class="custom-control-label" for="globe"> Sharing with ONE Globe <br>
                                I will receive special and exclusive offers, deals, surveys, and messages from the ONE Globe Group of
                                Companies. My data will be shared with Globe’s subsidiaries and affiliates so I can take advantage of their
                                products and services, as well.</label>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group text-center mb-0">
                        <button class="btn btn-lg btn-primary text-white btn-block" id="submit-buy-now" type="submit" disabled>Buy Now</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="buy-now-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <svg width="91" height="90" class="mx-auto" viewBox="0 0 91 90" fill="none" xmlns="http://www.w3.org/2000/svg">
            <ellipse opacity="0.3" cx="45.5" cy="44.9663" rx="45" ry="44.5" fill="#ADFFC2"/>
            <path d="M80.9683 44.4431C80.9683 63.5261 65.3246 78.996 46.0271 78.996C26.7296 78.996 11.0859 63.5261 11.0859 44.4431C11.0859 25.36 26.7296 9.89014 46.0271 9.89014C65.3246 9.89014 80.9683 25.36 80.9683 44.4431ZM63.6301 31.3547C62.3509 30.0897 60.2768 30.0897 58.9976 31.3547C58.9667 31.3853 58.9376 31.4176 58.9107 31.4516L43.7446 50.5622L34.6008 41.52C33.3216 40.255 31.2475 40.255 29.9682 41.52C28.689 42.785 28.689 44.8361 29.9682 46.1011L41.527 57.5314C42.8062 58.7965 44.8803 58.7965 46.1596 57.5314C46.188 57.5033 46.2149 57.4735 46.2401 57.4424L63.6766 35.8889C64.9092 34.6206 64.8937 32.6042 63.6301 31.3547Z" fill="#34C759"/>
        </svg>

        <h3 class="card-title">Congratulations!</h3>
        <p>Your request has been sent to your closest dealership. Please give it 24 hours for them to reply. Thanks!</p>        
        <p class="ref"></p>

        <button class="btn btn-primary" onclick="window.location.href ='<?=get_site_url();?>';">Go back to homepage</button>
      </div>
    </div>
  </div>
</div>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
/**
 *  TODO: Add toast notif
 */
jQuery(function($) {
    $(document).ready(function() {
        $('[name="preffered_date"]').datepicker({
            beforeShowDay: noWeekendsOrHolidays,
            dayNamesMin: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
            minDate: 0,
        });

        function noWeekendsOrHolidays(date) {
            var noWeekend = $.datepicker.noWeekends(date);
            return noWeekend;
        }

        $("form#buy-now").validate({
            ignore: [],
            rules: {
                first_name: {
                    required: true,
                    maxlength: 30,
                    alphadash: true,
                },
                last_name: {
                    required: true,
                    maxlength: 30,
                    alphadash: true,
                },
                email: {
                    maxlength: 30,
                    required: true,
                    email: true,
                },
                contact_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true,
                    phmob: true,
                },
                optional_contact_number: {
                    minlength: 10,
                    maxlength: 10,
                    number: true,
                    phmob: true,
                },
                preffered_date: {
                    required: true,
                    customdate: true,
                    validDate: true,
                    lessthantoday: true,   
                },
                address: {
                    required: true,
                    minlength: 1,
                    maxlength: 250,
                },
                citizenship: {
                    required: true,
                    minlength: 1,
                    maxlength: 50,
                    alphadash: true,
                },
                // tnc: {
                //     required: true,
                // },
                // one_globe: {
                //     required: true,
                // }
            },
            messages: {
                first_name: {
                    required: "First name is required",
                    maxlength: "Please enter no more than 30 characters",
                    alphadash: "First name should only contain alphabet letters"
                },
                last_name: {
                    required: "Last name is required",
                    maxlength: "Please enter no more than 30 characters",
                    alphadash: "Last name should only contain alphabet letters"
                },
                email: {
                    maxlength: "Please enter no more than 30 characters",
                    required: "Email is required",
                    email: "Invalid email address"
                },
                contact_number: {
                    required: "Mobile number is required",
                    number: "Invalid mobile number",
                    maxlength: "Please enter no more than 11 characters",
                    minlength: "Invalid mobile number",
                    phmob: "Invalid mobile number",
                },
                optional_contact_number: {
                    number: "Invalid mobile number",
                    maxlength: "Please enter no more than 11 characters",
                    minlength: "Invalid mobile number",
                    phmob: "Invalid mobile number",
                },
                preffered_date: {
                    required: "",
                    customdate: "Invalid date",
                    validDate: "Invalid date",
                    lessthantoday: "Invalid date", 
                },
                address: {
                    required: "Address is required",
                    maxlength: "Please enter no more than 250 characters",
                },
                citizenship: {
                    required: "Citizenship is required",
                    maxlength: "Please enter no more than 50 characters",
                    alphadash: "Citizenship should only contain alphabet letters"
                },
                // tnc: {
                //     required: "",
                // },
                // one_globe: {
                //     required: "",
                // }
            },
            invalidHandler: function(event, validator) {
                $.each(validator.invalid, function(key, value) {
                    $('[name=' + key + ']').closest('.form-group').addClass('form-error');
                });
                // $('.form-group .error').closest('.form-group').addClass('form-error');
            },
            submitHandler: function(element) {
                // const form = $(this).closest('form');
                const form = $(element);
                form.find('button[type="submit"]').prop('disabled', true);
                $('.overlay').show();
                const formData = new FormData();
                form.find('input, select').each(function() {
                    const type = $(this).attr('type');
                    const name = $(this).attr('name');
                    const value = $(this).val();

                    if ((type === 'checkbox' || type === 'radio') && $(this).is(':checked')) formData.append(name, value);
                    else if (type !== 'checkbox' && type !== 'radio') formData.append(name, value);
                });

                // if (files.length) {
                //     for (let i = 0; i < files.length; i ++) {
                //         const data = files[i];
                //         formData.append('files[]', data.file);
                //     }
                // }
                // if (files_proof.length) {
                //     for (let i = 0; i < files_proof.length; i ++) {
                //         const data = files_proof[i];
                //         formData.append('files_proof[]', data.file);
                //     }
                // }
                // console.log('hekhek')
                $.ajax({
                    type: 'post',
                    url: '<?=CARSADA_URL .'/wp-json/rest-api/buy-now';?>',
                    dataType: 'json',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    data: formData,
                    success: function(data) {
                        $('.overlay').hide();
                        if (data.id && data.buy_reference_number) $('#buy-now-modal').show('bs.modal', function() {
                            $(this).addClass('show');
                            $(this).find('.ref').html('Reference Number: ' + data.buy_reference_number);
                        });
                    },
                    error: function(err, status, error) {
                        $('.overlay').hide();
                        showToast({
                            type: 'error',
                            heading: 'Error !',
                            message: err.responseText.toString().replace(/'"'/g, ''),
                        });
                        // validateForm();
                    }
                });
            }
        });

        $.validator.addMethod("alphadash", function(value, element) {
            return this.optional(element) || /^[a-z\- ]+$/i.test(value);
        });
        $.validator.addMethod("phmob", function(value, element) {
            return this.optional(element) || /^(9)\d{9}/i.test(value);
        });
        $.validator.addMethod("email", function(value, element) {
            return this.optional(element) || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        });
        $.validator.addMethod("lessthantoday", function(value, element) {
            const current = new Date(value);
            var today = new Date();
            const year = today.getFullYear();
            const month = today.getMonth() + 1;
            const day = today.getDate();
            today = new Date(year, month - 1, day);
            
            return current >= today
        });
        $.validator.addMethod('validDate', function(value, element){				
            return value.split("/")[2] !== "0000";
        })
        $.validator.addMethod("customdate", function(value, element) {
            var r1 = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
            var r2 = /^(\d{1,2})-(\d{1,2})-(\d{4})$/;

            var a;
            if (r1.test(element)) {
            a = element.match(r1);
            } else if (r2.test(element)) {
            a = element.match(r2);
            } else {
            return true;
            }

            var d = new Date(a[3],a[1] - 1,a[2]);
            if (d.getFullYear() != a[3] || 
                d.getMonth() + 1 != a[1] || 
                d.getDate() != a[2]) {
                return true;
            } 
        });

        $('[name="tnc"]').change(function() {            
            if($(this).is(":checked")) {
                $('#submit-buy-now').prop("disabled", false);
            } else {
                $('#submit-buy-now').prop("disabled", true)
            }
        });

        $('form input, form select').on('keyup keypress keydown change blur', function() {
            const form = $(this).closest('form');
            const submit = form.find('[type="submit"]');
            if (!$(this).valid()) $(this).closest('.form-group').addClass('form-error');
            else $(this).closest('.form-group').removeClass('form-error');
            // validateForm();
        }); 
        // $('#apply-now').on('click', function() {
        //     // console.log('triggered');
        //     $('#buy-now-modal').show('bs.modal', function() {
        //         $(this).addClass('show');
        //     });
        // });

        // $('.upload-container').on('click', triggerUpload)
    });
    

    // function triggerUpload() {
    //     const input = document.createElement('input');
    //     input.setAttribute('type', 'file');
    //     input.setAttribute('accept', 'image/*');
    //     input.onchange = async () => {
    //         const file = input.files[0];
    //         // file type is only image.
    //         if (/^image\//.test(file.type)) {
    //             const toBase64 = await convert(file).catch(e => Error(e));
    //             if(toBase64 instanceof Error) {
    //                 // toBase64.message;
    //                 showToast({
    //                     type: 'error',
    //                     heading: 'Error !',
    //                     message: 'Sorry, we encountered an issue. Please try again.',
    //                 })
    //             }
                
    //             // if(typeof callback === 'function') {
    //             //     return callback.call(this, { base64:toBase64, file });
    //             // }
    //             addPreview(toBase64);

    //         } else {
    //             showToast({
    //                     type: 'error',
    //                     heading: 'Error !',
    //                     message: 'File type not allowed',
    //                 })
    //         }
    //     };
    //     input.click();
    // }

    // function convert(file) {
    //     return new Promise((resolve, reject) => {
    //     const reader = new FileReader();
    //         reader.readAsDataURL(file);
    //         reader.onload = () => {
    //             resolve(reader.result);
    //         }
    //         reader.onerror = reject;
    //     });
    // }

    // function addPreview(base64) {
    //     $('.upload-preview').css('background-image', 'url(' + base64 + ')');
    // }
});
</script>

