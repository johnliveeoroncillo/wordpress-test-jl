jQuery(function($) {
        

    $(document).ajaxComplete(function(event, jqxhr, settings){
        let with_alert_response = [
            '/wp-json/contact-form-7/v1/contact-forms/2916/feedback',
        ];
        const baseUrl = `${window.location.protocol}//${window.location.host.includes('localhost') ? window.location.host + '/carsada' : window.location.host}`;
        let url = settings.url;
        url = url.replace(baseUrl, "");
        console.log(baseUrl);
        console.log(url);
        if (with_alert_response.includes(url)) {
            $(document).scrollTop(0);
        }
    })

    
    $(document).ready(function() {
        $('body').after().on('click', '.wpcf7-response-output', function() {
            $(this).html('');
            $(this).hide();
            $(this).closest('form').removeClass('sent error failed abort');
        });

        /**
         * FOR METABOX ADMIN
         */
        if ($('.select2-custom').length) {
            $('.select2-custom').select2({
                placeholder: $(this).attr('placeholder'),
                allowClear: true
            });
    
            $('.select2-custom').each(function() {
                const self = $(this);
                const value = self.attr('data-value');
                self.val(value).change();
            })
        }

        /**
         * NEWSLETTER VALIDATION
         */

        $('forM input[type="email"]').keypress(function( e ) {
            if(e.which === 32) 
                return false;
        });

        $('.wpcf7 form input[name="mobile_number"]').on('keydown', function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;

            if ((evt.shiftKey && charCode == 187) || (charCode == 107))
            {
                return true;
            } else if ((charCode > 95) && (charCode < 106)) {
                return true;
            } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        });

        $('form[data-name="Newsletter"]').validate({
            ignore: [],
            rules: {
                email: {
                    required: true,
                    newsletteremail: true,
                    email: true,
                    maxlength: 30,
                },
            },
            messages: {
                email: {
                    required: "Email is required",
                    newsletteremail: "Invalid email address",
                    email: "Invalid email address",
                },
            },
        });

        $('.wpcf7 form').validate({
            ignore: [],
            rules: {
                first_name: {
                    required: true,
                    maxlength: 50,
                    alphadash: true,
                },
                last_name: {
                    required: true,
                    maxlength: 50,
                    alphadash: true,
                },
                email: {
                    required: true,
                    newsletteremail: true,
                    email: true,
                    maxlength: 30,
                },
                mobile_number: {
                    required: true,
                    maxlength: 13,
                    minlength: 13,
                    contactusmob: true,
                },
                message: {
                    required: true,
                    maxlength: 500,
                },
            },
            messages: {
                first_name: {
                    required: "First name is required",
                    alphadash: "First name should only contain alphabet letters",
                },
                last_name: {
                    required: "Last name is required",
                    alphadash: "Last name should only contain alphabet letters",
                },
                mobile_number: {
                    required: "Mobile number is required",
                    maxlength: "Please enter no more than 13 characters",
                    minlength: "Please enter 13 characters",
                    contactusmob: "Invalid mobile number"
                },
                email: {
                    required: "Email is required",
                    newsletteremail: "Invalid email address",
                    email: "Invalid email address",
                },
            },
            submitHandler: function(element) {
                $(element).closest('form').find('button[type="submit"]').prop('disabled', true);
                $(document).scrollTop(0);
            }   
        });

        $.validator.addMethod("newsletteremail", function(value, element) {
            return (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value));
        });
        $.validator.addMethod("alphadash", function(value, element) {
            return this.optional(element) || /^[a-z\- ]+$/i.test(value);
        });
        $.validator.addMethod("contactusmob", function(value, element) {
            return this.optional(element) || /^(\+639)\d{9}$/i.test(value);
        });

        $('.wpcf7 form input, .wpcf7 form select, .wpcf7 form textarea').on('keyup keypress keydown change blur', function() {
            const form = $(this).closest('form');
            const submit = form.find('[type="submit"]');
            let isValid = form.validate({
                ignore: [],
            }).checkForm();

            submit.prop('disabled', !isValid);
        }); 

        $('.wpcf7 form textarea').on('keyup', function() {
            const count = $(this).val().toString().length;
            console.log(count);
            $(this).closest('div').find('#count').html(count);
        })
    })
})