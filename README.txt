MyRoomorama Module Version 1.0.1 README
----------------------------------------------
$Id: README.txt 53 2015-11-14 23:35:00 kostas_stathakos $

Author: Kostas Stathakos <info@e-leven.net>
        http://e-leven.net
        This module is based on Gerrit Hoekstra's Auction Affiliate for ebay module so special thanks to him!
        http://extensions.joomla.org/extension/auction-affiliate-for-ebay

Introduction
------------

This module displays a Roomorama listing on your Joomla CMS web page. 

Direct web traffic to your Roomorama property of choice and make your personal or travel blog/webpage a little cuter. 

The listing can be your own listing, a friend's or someone else's, like a property you were hosted on  your travels. 

You can choose what information you want to display and optionally whether you want to ...

Through this module, a visitor can go directly to Roomorama from your website and complete a successful booking. 



Why is this module useful?
--------------------------

    * Easy way of showing your website visitors your Roomorama property(ies).
    * Simple configuration - the mimimum is to simply enter the Roomorama property id number in the module configuration.
    * There are other neat options to configure of course (see "What does it do?")
    * Direct web traffic to your Roomorama listing and increase your bookings!

    
What does it do?
----------------

It displays the following:

    * Roomorama listing image
    * Listing amenities
    * Minimum stay and maximum guests capacity
    * Number of beds, rooms, bathrooms
    * Price and currency
    * Location and country of listing
    * Book now button
    * Listing Description
    * Optional text
    
    
Displaying multiple Roomorama listings
----------------------------------------------

You can only configure one Roomorama listing per module. If you want to show multiple Roomorama listings, then set up multiple modudes instances on your Joomla website. 
The amount of information you display is highly configurable for each module instance.

Configuration options
----------------------------------------------

This is what you MUST configure:

    * Roomorama listing Id - the number of your listing, which you simple copy and paste from your listing's page on the Roomorama website.
   
   
This is what you may configure:

    * Display image - you may want to disable this although it is great to show an image.
    * Image width: You can select the image width in percentage.
    * Display Roomorama logo - if you don't want to show the brand, disable this.
    * Display location - displays the town and country where the listing is 
      located.
    * Display or hide amenities, size of property, number of rooms, bathrooms, beds, and description text.
    * Comment - you can add an additional comment about the Roomorama listing. If left blank, no comment will be displayed.

 
The geekier bits:
    * API Encoding - Choose JSON or XML. Default is JSON.
    * Debug - enable this to display the content of the API calls displayed.
      This setting is not affected by the Global Joomla Debug setting, nor does this
      setting affect the Joomla Global one.

Installation
------------
Steps:
    * You have Joomla 3.x installed on your webserver, right?
    * If this module is already installed, uninstall it first. 
    * The module's ZIP package is installed using the standard Joomla Component Installer.

Uninstallation
--------------
Uninstall the module through the Joomla Extension Manager. You will lose your configuration data, so take note of the the details first if they are important to you.

Support
-------
info@e-leven.net

Licensing
---------
GPL2