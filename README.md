# IPEDS E Resources Report

## Introduction
This program combines information from both NZ and IZ, for both Alma and Alma Analytics. Looking at the resulting combined spreadsheet helps to see concerns and get better e-resources counts for IPEDS. We can see duplicates and what is missing and then make adjustments as needed.
PALS staff discussed this project at Eluna Learns 2022: (https://el-una.org/meetings/eluna-learns-2022/eluna-learns-2022-eresources/)

## Requirements

This program requires a PHP Hosting: for running this PHP site 

## Installation

Download and upload all files and folders into your hosting. 

## Configuration

### config.ini
Edit this file to provide API key for each institutions as below fomat:

[API key: lib_code = api_key]

ALL = 123xyz

TST = 111222333


### emails.csv
Edit this file to provide the list of emails to receive reports.

For example:

TST1,email1@email.com

TST2,email2@email.com; email3@email.com

## Instructions for Using the Program

Once Configuration is Complete

You can run it for all: https://yourdomain.com/index.php?lib=ALL

Or just one institution: https://yourdomain.com/index.php?lib=TST 

(with TST is the institution code)



Then you have 2 options:

Option 1: Upload the NZ report

Since some data (groups) doesn’t come through the API, to be as complete as possible, run and download this report for NZ electronic collections:

•	Log in to the network zone

•	Search with * for Electronic collection

•	Export

You probably want to rename the file with the date for uploading: nzalloct5.xls

Option 2: Using API to get NZ electronic collection:

You can also run the program using only the API (without uploading the report) if you want to quickly get major electronic collections.

Once the program processes, click the link at the top to download the zip file of the reports or click who you want to email.

## TO DO

* Improving the API option: check and get electronic collections' GROUPS under services. For now, the program is only getting electronic collections' GROUPS under CDI.

## Maintainers/Sponsors

Current maintainers:

* [Simon Mai](https://github.com/simonhm)
* Jill Holman (documentation)
