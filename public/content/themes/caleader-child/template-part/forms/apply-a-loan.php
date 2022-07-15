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
    border-radius: 6px;
    padding: 12px;  
    color: #333333;
    font-weight: 800;
    font-size: 16px;
    line-height: 22px;
}

.card .card-body .form-control::placeholder {
    color: #8E8E93;
    font-weight: 500 !important;
}

.card .card-body .form-group {
    position: relative;
    margin-bottom: 2.4rem;
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

.card .card-body .form-group label:not(.float):not(.form-check-label):not(.custom-control-label):not(.error) {
    font-weight: 800;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.1px;
    color: #222222;
    margin-left: 14px;
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
    margin-bottom: 0;
}

.card .card-body .upload-container {
    border: 1px dashed #828282;
    border-radius: 5px;
    margin-left: 15px;
    cursor: pointer;
    position: relative;
    padding: 14px 22px;
}

.card .card-body button {
    min-width: 367px;
}

.card .card-body .upload-container .upload-default {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 30px;
}
.card .card-body .upload-container .upload-default .upload-text {
    flex: 1;
}

.card .card-body .upload-container .upload-default .upload-text p:nth-child(1) {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 12px;
    color: #000;
    line-height: 15.6px;
}

.card .card-body .upload-container .upload-default .upload-text p:nth-child(2) {
    font-size: 12px;
    line-height: 14.4px;
    font-weight: 400;
}

.card .card-body .upload-container .upload-default .upload-button button {
   min-width: unset;
   height: 44px;
}

.files-added {
    margin-left: 15px;
    display: none;
}

h2.title {
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    margin-top: 16px;
    margin-bottom: 18px;
    margin-left: 15px;
}

.files-added h2.title {
    margin-left: 0;
}

.files-added ul li {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 6px;
    padding-top: 18px;
    padding-bottom: 18px;
}

.files-added ul li:not(:last-child) {
    border-bottom: 1px solid #00000024;
}

.files-added ul li svg {
    margin-right: 8px;
}

.files-added ul li .file-name, .files-added ul li .file-preview, .files-added ul li .file-size, .files-added ul li .file-error {
    font-weight: 400;
    font-size: 12px;
    line-height: 14px;
}

.files-added ul li .file-name {
    color: #000;
    max-width: 30%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.files-added ul li .file-name::after {
    color: #767676;
    content: '●';
    margin-left: 6px;
    font-size: 8px;
}

.files-added ul li .file-preview {
    color: #5A91D5;
}

.files-added ul li .file-size {
    margin-left: auto;
    margin-right: 8px;
}

.files-added ul li a {
    cursor: pointer;
}

.files-added ul li.error * {
    color: #DC3C54 !important;
    border-color: #DC3C54 !important;
}

.modal {
    background-color: #0000008a !important;
}

.modal .modal-header {
    border-bottom: 1px solid #bdbdbd85;
    padding: 10px 0 5px 10px;
}

.modal .modal-header .modal-title {
    font-size: 12px;
    line-height: 12px;
    letter-spacing: 1px;
    font-family: 'Exo 2';
    text-transform: uppercase;
    font-weight: 800;
    margin-top: 8px;
    margin-bottom: 12px;
}

.modal .modal-header .close {
    position: absolute;
    top: 10;
    right: 18px;
    padding: 0;
    margin: 0;
}

.modal-content {
    border-radius: 24px !important;
    min-width: 400px !important;
    max-width: 604px !important;
    overflow: hidden !important;
    max-height: 90vh !important;
    overflow: auto !important;
}

.modal-content .modal-body {
    text-align: center !important;
    padding: 32px 38px 50px 38px !important;
}

#file-preview-modal .modal-body {
    padding: 15px 36px !important;
}

.modal-content .modal-body .card-title {
    font-family: 'Exo 2' !important;
    font-style: normal !important;
    font-weight: 800 !important;
    font-size: 40px !important;
    color: #222222 !important;
    margin-bottom: 24px !important;
}

.modal-content .modal-body p {
    font-weight: 300 !important;
    font-size: 16px !important;
    color: #4F4F4F !important;
    margin-bottom: 0.6rem !important;
}

.modal-content .modal-body p.ref {
    font-weight: 700 !important;
    color: #222222 !important;
    font-size: 20px !important;
    margin-bottom: 1.2rem !important;
}

.modal-content .modal-body button {
    font-size: 16px;
    font-weight: 700;
    padding: 12px 0;
    width: 100%;
    max-width: 400px;
}

#file-preview-modal .modal-content {
    min-width: 500px;
}

label a {
    color: #005CEE;
}

.card .card-body .form-group label.error {
    margin-left: 0;
    padding-left: 0;
    text-align: right;
    font-weight: 400;
    color: #FC5555;
    margin-top: 4px;
    font-size: 12px;
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

label.border-b {
    border-bottom: 1px solid #E5E7EB;
    padding-bottom: 8px;
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

@media screen and (max-width: 768px) {
    .card .card-body .upload-container .upload-default {
        flex-direction: column;
        gap: 15px;
    }

    .files-added ul li {
        flex-direction: column;
        align-items: start;
        text-align: left;
        position: relative;
    }

    .files-added ul li .file-size {
        margin-left: 0;
    }

    .files-added ul li .file-remove {
        position: absolute;
        top: 8px;
        right: 0;
    }

    .files-added ul li .file-name {
        max-width: 100%;
    }

    .files-added ul li .file-name::after {
        display: none;
    }
}

</style>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Personal Information</h3>
    </div>
    <div class="card-body">
        <form id="apply-loan" enctype="multipart/form-data">
            <?php wp_nonce_field( 'apply_a_loan_submit', 'apply_a_loan_nonce_field' ); ?>
            <input type="hidden" name="car_slug" value="<?=get_query_var('loan-car');?>" readonly />
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="float">First name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="float">Last name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter last name" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group contact_number">
                        <label class="float">Contact number</label>
                        <input type="text" class="form-control" name="contact_number" placeholder="9XXXXXXXXX" />
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group optional_contact_number">
                        <label class="float">Alternative contact number (optional) </label>
                        <input type="text" class="form-control" name="optional_contact_number" placeholder="9XXXXXXXXX" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="float">Citizenship</label>
                        <input type="text" class="form-control" name="citizenship" placeholder="Enter citizenship" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed">
                        <label>Marital Status</label>
                        <div class="form-check">
                            <input class="" type="radio" name="marital_status" value="Single">
                            <label class="form-check-label">
                                Single
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="" type="radio" name="marital_status" value="Married">
                            <label class="form-check-label">
                                Married
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="" type="radio" name="marital_status" value="Widow">
                            <label class="form-check-label">
                                Widow
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="" type="radio" name="marital_status" value="Separated">
                            <label class="form-check-label">
                                Separated
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed">
                        <label>Sex</label>
                        <div class="form-check">
                            <input class="" type="radio" name="sex" value="Male">
                            <label class="form-check-label">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="" type="radio" name="sex" value="Female">
                            <label class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group condensed">
                        <label>Payment Terms</label>

                        <?php
                            $auto_terms = (isset($_GET['terms']) ? $_GET['terms'] : '');
                            $period_array = array();
                            $period = CARSADA_PERIOD;
                            if (!empty($period)) {
                                $periods = explode(',', $period);
                                if (!empty($periods)) $period_array = $periods;
                            }

                            if (!empty($period_array)) { 
                                foreach($period_array as $value) { ;?>
                                    <div class="form-check">
                                        <input class="" type="radio" name="terms" value="<?=trim($value);?>" <?=$auto_terms == trim($value) ? 'checked="checked"' : '';?>>
                                        <label class="form-check-label">
                                            <?=trim($value);?> yr<?=(int) trim($value) > 1 ? 's' : '';?>
                                        </label>
                                    </div>
                        <?php   }
                            }
                            else { ;?>
                                <div class="form-check">
                                    <input class="" type="radio" name="terms" value="1" <?=$auto_terms == 1 ? 'checked="checked"' : '';?>>
                                    <label class="form-check-label">
                                        1 yr
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="terms" value="2" <?=$auto_terms == 2 ? 'checked="checked"' : '';?>>
                                    <label class="form-check-label">
                                        2 yrs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="terms" value="3" <?=$auto_terms == 3 ? 'checked="checked"' : '';?>>
                                    <label class="form-check-label">
                                        3 yrs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="terms" value="4" <?=$auto_terms == 4 ? 'checked="checked"' : '';?>>
                                    <label class="form-check-label">
                                        4 yrs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="radio" name="terms" value="5" <?=$auto_terms == 5 ? 'checked="checked"' : '';?>>
                                    <label class="form-check-label">
                                        5 yrs
                                    </label>
                                </div>
                        <?php } ;?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed">
                        <label>Down Payment percentage</label>

                        <?php
                            $auto_dp = (isset($_GET['dp']) ? $_GET['dp'] : '');

                            $downpayment_array = array();
                            $downpayment = CARSADA_DOWNPAYMENT;
                            if (!empty($downpayment)) {
                                $downpayments = explode(',', $downpayment);
                                if (!empty($downpayments)) $downpayment_array = $downpayments;
                            }

                            if (!empty($downpayment_array)) { 
                                foreach($downpayment_array as $value) { ;?>
                                     <div class="form-check">
                                        <input class="" type="radio" name="downpayment_percentage" value="<?=trim($value);?>" <?=$auto_dp == trim($value) ? 'checked="checked"' : '';?>>
                                        <label class="form-check-label">
                                            <?=trim($value);?>%
                                        </label>
                                    </div>
                        <?php   }
                            }
                            else { ;?>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="15" <?=$auto_dp == 15 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    15%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="20" <?=$auto_dp == 20 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    20%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="30" <?=$auto_dp == 30 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    30%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="40" <?=$auto_dp == 40 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    40%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="50" <?=$auto_dp == 50 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    50%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="60" <?=$auto_dp == 60 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    60%
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="downpayment_percentage" value="70" <?=$auto_dp == 70 ? 'checked="checked"' : '';?>
                                <label class="form-check-label">
                                    70%
                                </label>
                            </div>
                        <?php } ;?>

                       
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed mt-3" data-type="id">
                        <label class="border-b">Upload Valid ID</label>
                        
                        <h2 class="title">Please upload 2 valid ID</h2>

                        <div class="upload-container">
                            <div class="upload-default">
                                
                                <div class="upload-icon">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32 32L24 24L16 32" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M24 24V42" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M40.7809 36.78C42.7316 35.7165 44.2726 34.0337 45.1606 31.9972C46.0487 29.9607 46.2333 27.6864 45.6853 25.5334C45.1373 23.3803 43.8879 21.471 42.1342 20.1069C40.3806 18.7427 38.2226 18.0014 36.0009 18H33.4809C32.8755 15.6585 31.7472 13.4846 30.1808 11.642C28.6144 9.79927 26.6506 8.33567 24.4371 7.36118C22.2236 6.3867 19.818 5.92669 17.4011 6.01573C14.9843 6.10478 12.619 6.74057 10.4833 7.8753C8.34747 9.01003 6.49672 10.6142 5.07014 12.5671C3.64356 14.5201 2.67828 16.771 2.24686 19.1508C1.81544 21.5305 1.92911 23.977 2.57932 26.3065C3.22954 28.636 4.39938 30.7877 6.0009 32.6" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M32 32L24 24L16 32" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <div class="flex-1 upload-text">
                                    <p>Select a file or drag and drop here</p>
                                    <p>JPG or PNG, file size no more than 10MB</p>
                                </div>

                                <div class="upload-button">
                                    <button class="btn btn-outline-primary" type="button">Select File</button>
                                </div>
                            </div>
                        </div>

                        <div class="files-added">
                            <h2 class="title">File added</h2>

                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed mt-3" data-type="proof">
                        <label class="border-b">Upload proof of billing</label>

                        <div class="upload-container">
                            <div class="upload-default">
                                
                                <div class="upload-icon">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32 32L24 24L16 32" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M24 24V42" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M40.7809 36.78C42.7316 35.7165 44.2726 34.0337 45.1606 31.9972C46.0487 29.9607 46.2333 27.6864 45.6853 25.5334C45.1373 23.3803 43.8879 21.471 42.1342 20.1069C40.3806 18.7427 38.2226 18.0014 36.0009 18H33.4809C32.8755 15.6585 31.7472 13.4846 30.1808 11.642C28.6144 9.79927 26.6506 8.33567 24.4371 7.36118C22.2236 6.3867 19.818 5.92669 17.4011 6.01573C14.9843 6.10478 12.619 6.74057 10.4833 7.8753C8.34747 9.01003 6.49672 10.6142 5.07014 12.5671C3.64356 14.5201 2.67828 16.771 2.24686 19.1508C1.81544 21.5305 1.92911 23.977 2.57932 26.3065C3.22954 28.636 4.39938 30.7877 6.0009 32.6" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M32 32L24 24L16 32" stroke="black" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <div class="flex-1 upload-text">
                                    <p>Select a file or drag and drop here</p>
                                    <p>JPG or PNG, file size no more than 10MB</p>
                                </div>

                                <div class="upload-button">
                                    <button class="btn btn-outline-primary" type="button">Select File</button>
                                </div>
                            </div>
                        </div>

                        <div class="files-added">
                            <h2 class="title">File added</h2>

                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group condensed mt-3">
                        <label class="font-16px">To continue your loan, you must agree to the following:</label>

                        <div class="form-group condensed">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tnc" name="tnc">
                                <label class="custom-control-label" for="tnc">I agree to the <a href="<?=CARSADA_TERMS_URL;?>" target="_blank">Terms and Conditions</a> of Carsada. I understand that the collection and use of this data by
                                    917Ventures (which owns and operates Carsada), which may include personal information and sensitive
                                    personal information, shall be in accordance with the <a href="<?=CARSADA_PRIVACY_URL;?>" target="_blank">Data Privacy Act of 2012</a> and the <a href="https://917ventures.com/privacy" target="_blank">Privacy Policy of
                                    917Ventures</a>.</label>
                            </div>
                        </div>
                        <div class="form-group condensed">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="globe" name="globe">
                                <label class="custom-control-label" for="globe"> Sharing with ONE Globe
                                    I will receive special and exclusive offers, deals, surveys, and messages from the ONE Globe Group of
                                    Companies. My data will be shared with Globe’s subsidiaries and affiliates so I can take advantage of their
                                    products and services, as well.</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group text-center">
                        <button class="btn btn-lg btn-primary text-white" id="apply-now" type="submit" disabled>Apply Now</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="apply-loan-modal">
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

<div class="modal fade" id="file-preview-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Preview</h3>                          
        <a class="close">
            <svg width="12" height="12" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.77757 0.12132L7.19178 1.53553L1.53493 7.19239L0.120716 5.77817L5.77757 0.12132Z" fill="#828282"/>
                <path d="M7.19178 5.77817L5.77757 7.19239L0.120716 1.53553L1.53493 0.12132L7.19178 5.77817Z" fill="#828282"/>
            </svg>
        </a>
      </div>
      <div class="modal-body">
        <img src="">
      </div>
    </div>
  </div>
</div>


<script>
/**
 *  TODO: Add toast notif
 */
jQuery(function($) {
    const base = `<li data-index="<index>" data-base64="<base64>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.75391 10.5C10.0494 10.5 10.342 10.4418 10.6149 10.3287C10.8879 10.2157 11.136 10.0499 11.3449 9.84099C11.5538 9.63206 11.7196 9.38402 11.8326 9.11104C11.9457 8.83806 12.0039 8.54547 12.0039 8.25C12.0039 7.95453 11.9457 7.66194 11.8326 7.38896C11.7196 7.11598 11.5538 6.86794 11.3449 6.65901C11.136 6.45008 10.8879 6.28434 10.6149 6.17127C10.342 6.0582 10.0494 6 9.75391 6C9.15717 6 8.58487 6.23705 8.16292 6.65901C7.74096 7.08097 7.50391 7.65326 7.50391 8.25C7.50391 8.84674 7.74096 9.41903 8.16292 9.84099C8.58487 10.2629 9.15717 10.5 9.75391 10.5Z" fill="#828282"/>
                        <path d="M21 21C21 21.7956 20.6839 22.5587 20.1213 23.1213C19.5587 23.6839 18.7956 24 18 24H6C5.20435 24 4.44129 23.6839 3.87868 23.1213C3.31607 22.5587 3 21.7956 3 21V3C3 2.20435 3.31607 1.44129 3.87868 0.87868C4.44129 0.316071 5.20435 0 6 0L14.25 0L21 6.75V21ZM6 1.5C5.60218 1.5 5.22064 1.65804 4.93934 1.93934C4.65804 2.22064 4.5 2.60218 4.5 3V18L7.836 14.664C7.95422 14.5461 8.10843 14.4709 8.27417 14.4506C8.43992 14.4302 8.60773 14.4657 8.751 14.5515L12 16.5L15.2355 11.97C15.2988 11.8815 15.3806 11.8078 15.4753 11.754C15.5699 11.7003 15.6751 11.6678 15.7836 11.6588C15.8921 11.6498 16.0012 11.6645 16.1034 11.702C16.2056 11.7394 16.2985 11.7986 16.3755 11.8755L19.5 15V6.75H16.5C15.9033 6.75 15.331 6.51295 14.909 6.09099C14.4871 5.66903 14.25 5.09674 14.25 4.5V1.5H6Z" fill="#828282"/>
                    </svg>

                    <p class="file-name"><file_name></p>
                    <a class="file-preview">Preview</a>
                    <p class="file-error" style="display: none;"></p>

                    <p class="file-size"><file_size></p>
                    <a class="file-remove">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.77757 0.12132L7.19178 1.53553L1.53493 7.19239L0.120716 5.77817L5.77757 0.12132Z" fill="#D9D9D9"/>
                            <path d="M7.19178 5.77817L5.77757 7.19239L0.120716 1.53553L1.53493 0.12132L7.19178 5.77817Z" fill="#D9D9D9"/>
                        </svg>
                    </a>
                </li>`;
    const files = [];
    const files_proof = [];

    $(document).ready(function() {
        $('.upload-container').on('click', triggerUpload);
    });

    function triggerUpload(e) {
        const self = $(e.target);
        const type = self.closest('[data-type]').attr('data-type');

        console.log(type, type === 'id' ? files.length : files_proof.length);
        if (type === 'id' && files.length >= 2) {
            console.log('id');
            return;
        }
        if (type === 'proof' && files_proof.length >= 1) {
            console.log('proof');
            return;
        }



        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = async () => {
            const file = input.files[0];
            const size = (file.size / (1024*1024));

            if (size > 10) {
                addFile({ base64: '', file, error: 'file_size' }, self);
                return;
            }
            // file type is only image.
            if (/^image\//.test(file.type)) {
                const toBase64 = await convert(file).catch(e => Error(e));
                if(toBase64 instanceof Error) {
                    // toBase64.message;
                    // showToast({
                    //     type: 'error',
                    //     heading: 'Error !',
                    //     message: 'Sorry, we encountered an issue. Please try again.',
                    // })
                    addFile({ base64: toBase64, file, error: 'file_failed' }, self);
                }
                
                addFile({ base64: toBase64, file }, self);

            } else {
                addFile({ base64: '', file, error: 'file_type' }, self);
            }
        };
        input.click();
    }

    function convert(file) {
        return new Promise((resolve, reject) => {
        const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                resolve(reader.result);
            }
            reader.onerror = reject;
        });
    }

    function addFile(data, element) {
        const parent = element.closest('div.form-group');
        const type = parent.attr('data-type');

        const index = (type === 'id' ? files.push(data) : files_proof.push(data)) - 1;
        const size = (data.file.size / (1024*1024)).toFixed(2);

        const error = data.error;

        element.closest('div.form-group').find('.files-added ul').append(base.replace(/<index>/g, index).replace(/<file_name>/g, data.file.name).replace(/<file_size>/g, size + 'mb').replace(/<base64>/g, data.base64));

        if (data.error) {
            const last_li = element.closest('div.form-group').find('.files-added ul li').last();
            last_li.find('.file-preview').remove();
            last_li.addClass('error');

            let message = 'Failed';
            switch(data.error) {
                case "file_size":
                    message = 'Exceeded allowed file size (max of 10MB only)';
                    break;
                case "file_type":
                    message = 'Invalid file format (must be JPG or PNG)';
                    break;
            }

            last_li.find('.file-error').html(message).show();
        }
        showHideFiles(element, type);
    }

    function showHideFiles(element, type) {
        const parent = element.closest('div.form-group');
        let visibility = 'hide';
        if (type === 'id' && files.length) visibility = 'show';
        if (type === 'proof' && files_proof.length) visibility = 'show';
        parent.find('.files-added')[visibility]();
        
        const self = element.closest('[data-type]');
        switch (type) {
            case "id":
                if (files.length > 2) {
                    files.pop();
                    self.find('ul li').last().remove();
                }
                else self.find('button').prop('disabled', false);

                if (files.length >= 2) self.find('button').prop('disabled', true);
                break;
            
            case "proof":
                if (files_proof.length > 1) {
                    files_proof.pop();
                    self.find('ul li').last().remove();
                    console.log(files_proof, files_proof.length)
                }
                else self.find('button').prop('disabled', false);

                if (files_proof.length >= 1) self.find('button').prop('disabled', true);
                break;
        }

        validateForm();
    }

    $('body').on('click', '.files-added ul li a.file-remove', function() {
        const li = $(this).closest('li');
        const parent = li.closest('div.form-group');
        const type = parent.attr('data-type');
        const index = li.index();
        $(this).closest('li').remove();
        if (type === 'id') files.splice(index, 1);
        else if (type === 'proof') files_proof.splice(index, 1);
        showHideFiles(parent, type);
    });

    $('body').on('click', '.files-added ul li a.file-preview', function() {
        const li = $(this).closest('li');
        const base64 = li.attr('data-base64');
        // const index = li.index();
        // const file = files[index];

        $('#file-preview-modal').show('bs.modal', function() {
            $(this).find('img').attr('src', '');
            $(this).addClass('show');
            $(this).find('img').attr('src', base64);
        });
    });

    $('body').on('click', '.modal .close', function() {
        $(this).closest('.modal').hide('bs.modal');
    });
    
    $("form#apply-loan").validate({
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
                    // number: true,
                    phmob: true,
                },
                optional_contact_number: {
                    minlength: 10,
                    maxlength: 10,
                    // number: true,
                    phmob: true,
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
                tnc: {
                    required: true,
                }
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
                    maxlength: "Please enter no more than 10 characters",
                    minlength: "Please enter 10 characters",
                    phmob: "Invalid mobile number",
                },
                optional_contact_number: {
                    number: "Invalid mobile number",
                    maxlength: "Please enter no more than 10 characters",
                    minlength: "Please enter 10 characters",
                    phmob: "Invalid mobile number",
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
                tnc: {
                    required: "",
                }
            },
            submitHandler: function(element) {
                // const form = $(this).closest('form');
                const form = $(element);
                form.find('button[type="submit"]').prop('disabled', true);
                const formData = new FormData();
                form.find('input, select').each(function() {
                    const type = $(this).attr('type');
                    const name = $(this).attr('name');
                    const value = $(this).val();

                    if ((type === 'checkbox' || type === 'radio') && $(this).is(':checked')) formData.append(name, value);
                    else if (type !== 'checkbox' && type !== 'radio') formData.append(name, value);
                });

                if (files.length) {
                    for (let i = 0; i < files.length; i ++) {
                        const data = files[i];
                        if (!data.error || data.error == '') formData.append('files[]', data.file);
                    }
                }
                if (files_proof.length) {
                    for (let i = 0; i < files_proof.length; i ++) {
                        const data = files_proof[i];
                        if (!data.error || data.error == '') formData.append('files_proof[]', data.file);
                    }
                }

                $.ajax({
                    type: 'post',
                    url: '<?=CARSADA_URL .'/wp-json/rest-api/apply-a-loan';?>',
                    dataType: 'json',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    data: formData,
                    success: function(data) {
                        if (data.id && data.loan_reference_number) $('#apply-loan-modal').show('bs.modal', function() {
                            $(this).addClass('show');
                            $(this).find('.ref').html('Reference Number: ' + data.loan_reference_number);
                        });
                    },
                    error: function(err, status, error) {
                        showToast({
                            type: 'error',
                            heading: 'Error !',
                            message: err.responseText.toString().replace(/'"'/g, ''),
                        });
                        validateForm();
                    }
                });
            }
        });

        $.validator.addMethod("alphadash", function(value, element) {
            return this.optional(element) || /^[a-z\- ]+$/i.test(value);
        });
        $.validator.addMethod("phmob", function(value, element) {
            return this.optional(element) || /(\9\d{9})/i.test(value);
        });
        $.validator.addMethod("email", function(value, element) {
            return this.optional(element) || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        });

        $('form input, form select').on('keyup keypress keydown change blur', function() {
            const form = $(this).closest('form');
            const submit = form.find('[type="submit"]');
            if (!$(this).valid()) $(this).closest('.form-group').addClass('form-error');
            else $(this).closest('.form-group').removeClass('form-error');
            validateForm();
        }); 

        function validateForm() {
            const form = $('form#apply-loan');
            const submit = form.find('[type="submit"]');
            let isValid = form.validate({
                ignore: [],
            }).checkForm();

            // console.log(isValid);

            const hasIdErrors = files.filter(el => el.error);
            const hasProofErrors = files_proof.filter(el => el.error);
            // console.log(hasIdErrors, hasProofErrors)
            if (!files.length || files.length < 2 || !files_proof.length || files_proof.length < 1 || hasIdErrors.length || hasProofErrors.length) isValid = false;
            // console.log(isValid);
            submit.prop('disabled', !isValid);
        }
});
</script>