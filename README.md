# IPEDS E Resources Report

## Introduction
This program combines information from both NZ and IZ, for both Alma and Alma Analytics. Looking at the resulting combined spreadsheet helps to see concerns and get better e-resources counts for IPEDS. We can see duplicates and what is missing and then make adjustments as needed.
PALS staff discussed this project at Eluna Learns 2022: (https://el-una.org/meetings/eluna-learns-2022/eluna-learns-2022-eresources/)

## Requirements

This program requires a PHP Hosting: for running this PHP site 

## Installation

Download and upload all files and folders into your hosting. 

## Configuration

For detailed documentation go to: https://islandora.mnpals.net/pals/islandora/object/PALSrepository%3A429

To configure, go to Home --> Administration --> Islandora --> Islandora Utility Modules --> Exhibits Browse. 

Login as repository manager/administrator.  

First you need a collection PID: Navigate to the collection that will become an exhibit.  Click on Manage.  Click on Datastreams.
Next copy the "Collection PID".  For example: DEMOrepository:exhibit_demo (above "MIME TYPE" column). 

Next navitage to Exhibits Browse configuration (Home --> Administration --> Islandora --> Islandora Utility Modules --> Exhibits Browse).

![Configuration](http://iprotion.com/sites/default/files/2018-03/exhibits.jpg)

In "Exhibits pages", in first column, paste the "Collection PID".  

In second column, choose the Type of exhibit (timeline or slideshow).

In the third column, type in your custom path name.  For example, athletics_slideshow.  Click Save.

Under Operations, click on Configure. 

Under Pagename, name the exhibit.  

The module can display any format - photographs, audio, video, etc. 

Other metadata elements can be used for the headline and description (Dublin Core or MODs).

Click Save.  

Next, click on "View Page" to see what the exhibit would look like.

The pages are located at ..../exhibits/{your-path} 

![Configuration](http://iprotion.com/sites/default/files/2018-03/tl.jpg)

### Instructions for Using the Program

Instructions for Using the Program once Configuration is Complete
You can run it for all: https://yourdomain.com/index.php?lib=ALL
Or just one institution: https://yourdomain.com/index.php?lib=TST (with TST is the institution code)

You will have 2 options:

Option 1: Upload the NZ report
Since some data doesn’t come through the API, to be as complete as possible, run and download this report for NZ electronic collections:
•	Log in to the network zone
•	Search with * for Electronic collection
•	Export

You probably want to rename the file with the date for uploading: nzalloct5.xls

Option 2: Using API to get NZ electronic collection:
You can also run the program using only the API (without uploading the report) if you want to quickly get major electronic collections.

Once the program processes, click the link at the top to download the zip file of the reports or click who you want to email.

### TO DO

* Improving the API option: check and get electronic collections' GROUPS under services. For now, the program is only getting electronic collections' GROUPS under CDI.

## Maintainers/Sponsors

Current maintainers:

* [Simon Mai](https://github.com/simonhm)
* Jill Holman (documentation)
