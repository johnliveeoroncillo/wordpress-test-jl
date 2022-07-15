### INSTALL CALEADER PLUGINS ###
1. Go to: Caleader > Plugin
2. Install and update all plugins
3. Done

#### IMPORT DEMO DATA ####
1. Export public env database
2. Import it to your local
3. Under wp_options change option_values to http://localhost/carsada
    a. Note: option_value depend on what is setup w/in your local e.i: http://localhost/carsada or http://localhost:8080/carsada
4. Login to your admin account
5. Go to: Caleader > Plugin
6. Install "Import Demo" (if theres none this means it's already been installed)
7. Go to: Caleader > Import Demo Data
8. Choose Caleader to Import
9. Wait for the import message as done
10. Export your local database
11. Import to public env database
12. Done

### GENERAL SETUP ###
1. Change currency
    a. Go to: Caleader Listing/Listing > Settings > General > Measurements
    b. Change Payment Currenct to "₱"
    c. Save changes

#### SETUP HEADER, MENU FOOTER AND ICON LOGO ####
1. Appearance > Customize > Site Identity
    a. Logo = Header Logo
    b. Site Icon = Favicon
2. Appearance > Customize > Caleader Theme Options > Footer Style
    a. Footer Site Logo
    b. Clear Subscribe value
3. Appearance > Customize > Caleader Theme Options > Header
    a. Disable Top Header Show/Hide
    b. Disable Add your Button On/Off
4. Go to: Appearance > Menus > Manage Locations
    a. Edit Primary and Footer Menu
    b. Save


#### CALEADER SEARCH LISTING ADDITIONAL FILTER ####
1. Caleader Listing/Listing > Settings
    a. Goto: Listings > Specifications 
        - Condition
            Check:
                NEW
                USED
    b. Goto: Listings > Listing Setup 
        - Set Custom Post Name value to "Listing"
        - Set Listing Slug value to "listing"
    c. Goto: Filtering
        - Filtering Fields
            Select Homepage/Archieve Filtering Fields: Condition, Year, Make, Model, Price
        - Home Page Search Bar Count Text: Search Cars
        - Home Page Search Bar Bottom Text:
        - Homepage Select Model Text: Model
        - Homepage Select Make Text: Make
        - Hompage Sticky Search: No

#### CALEADER LISTING ####
1. Go to Caleader Listing/Listing > Settings
    a. Go to Listings
        - Drivetrain: mark as check all items
        - Transmission Types: mark as check all except (Automated Manual Transmission)
        - Post Per Page: 9
        - Fuel Types: Checkall
    b. Go to Filtering
        - Search Archive Filtering Fields: Select Year, Make, Body Type, Drive Type, Transmission, and Price
    c. Go to Page Settings
        - Set Archive Page Name value to "CARS"
2. Go to Appearance > Customize > Caleader Theme Option > Header
    a. Change Breadcrumb Image

### CALEADER SINGLE ###
1. Go to Appearance > Widget > Listing Details Sidebar > Carsada Calculator
    a. Change Dawn Payment Title to "Down Payment (PHP)"
    b. Change Interest Rate Title to "Interest Rate (%)"
    c. Change Period Title to "Period (Month)"
    d. Save
2. Go to Appearance > Widget > Listing Details Sidebar > Button Widget For Carleader
    a. Remove all buttons
    b. Add New
        - Set Button Txt for your widget to "Download Inspection Report"
        - Set Class to "icon-download btn-link text-primary text-underline font-weight-bold mt-0 d-flex align-self-center"
    c. Add New
        - Set Button Txt for your widget to "Buy Now"
        - Set Class to "btn btn-primary btn-lg"
    d. Add New
        - Set Button Txt for your widget to "Apply for Loan"
        - Set Class to "btn btn-warning btn-lg"
    e. Add New
        - Set Button Txt for your widget to "Book a Visit"
        - Set Class to "btn btn-outline-dark btn-lg"
    f. Save
3. Go to: Caleader Listing/Listing > Settings > Page Settings
    a. Under Single Page Settings
    b. Change value of Ineterested on/off to "No"
    c. Save Settings
4. Go to: Caleader Listing/Listing > Settings > General
    a. Change value of Can Add To Cart to "No"
    b. Change value of Open Cart On Add Product to "No"
    c. Change value of Test Drive to "No"

#### DEALER AND FINANCIAL INSTITUTE MANAGEMENT ####
1. Go to plugins and enable the ff.:
    a. Carsada Dealer Management
    b. Carsada Financial Institute Management


#### CONTACT US ####
1. Goto Contact > Add New
    a. Form: Carsada Contact Us
        <div class="contact-us">
        <div class="row">
        <div class="col-sm-12">
            [response]
        </div>
        <div class="col-md-6">
            <div class="form-row">
            <input type="text" class="form-control" name="first_name" placeholder="First Name" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-row">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-row">
            <input type="email" class="form-control" name="email" placeholder="Email Address" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-row">
            <input type="text" class="form-control" name="company" placeholder="Company" />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-row">
            <textarea class="form-control" rows="5"name="message" placeholder="Message"></textarea>
            <p><span id="count">0</span>/500</p>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-row d-block text-center">
            <button class="btn btn-primary btn-lg" type="submit" disabled>Send Message</button>
            </div>
        </div>

        </div>
        </div>
        
    b. Mail
        Subject: [_site_title] "Contact Us"
        Additional Headers: 
        Message Body:
            From: [first_name] [last_name] <[email]>
            Subject: "Contact Us"

            Name: [first_name] [last_name]
            Company: [company]

            Message Body:
            [message]

            -- 
            This e-mail was sent from a contact form on [_site_title] ([_site_url])
    c. Messages
        Sender's message was sent successfully: Message has been sent.
2. Pages > All Pages
    a. Hover Contacts 
        Quick Edit:
            Title: Contacts -> Contact Us
            Slug: contacts -> contact-us
        Click Update
    a. Click edit with elementor
        Change content to shortcode and paste this code: [contact-form-7 title="Carsada Contact Us"]


#### CHANGE CURRENCY POSITION ####
1. Listing > Settings > General > Measurements
    a. Currency Position: Before
    b. Payment Currency: ₱
2. WooCommerce > Currency Options
    a. Currency: ₱

#### BOOK A VISIT ####
1. Goto: Templates > Saved Templates
    a. Import Templates
    b. Upload file (Request you may copy it on lower env or request it on the previous developer)    

#### BUY NOW ####
1. Goto: Templates > Saved Templates
    a. Import Templates
    b. Upload file (Request you may copy it on lower env or request it on the previous developer)    

#### COMING SOON ####
1. Goto: Templates > Saved Templates
    a. Import Templates
    b. Upload file (Request you may copy it on lower env or request it on the previous developer)    