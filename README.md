# IPEDS E Resources Report

## Introduction
This program combines information from both Network Zone (NZ) and Institution Zone (IZ), for both Alma and Alma Analytics. Looking at the resulting combined spreadsheet helps to see concerns and get better e-resources counts for IPEDS. We can see duplicates and what is missing and then make adjustments as needed.

PALS staff discussed this project at Eluna Learns 2022: (https://el-una.org/meetings/eluna-learns-2022/eluna-learns-2022-eresources/)

## Requirements

PHP Hosting: for running this PHP web-based program 

## Installation

Download and upload all files and folders into your hosting environment. 

## Configuration

### config.ini
Edit this file to provide API key for network zone (NZ) and each institution zone (IZ) as formatted here:

[lib_code = api_key]

```
NZ = 111_api_key_of_network_zone

TST1 = 123xyzapikey1

TST2 = 111222333apikey2
```


### emails.csv
Edit this file to provide the list of emails to receive reports when you run this program for ALL.

For example:

```
TST1,email1@email.com
 
TST2,email2@email.com; email3@email.com
```

### IZan_paths.csv
Edit this file to provide the list of IZ analytic reports' paths for each institutions

For example:

```
TST1,%2Fshared%2FTest1%20Library%20blahblahblah%2Fblahblahblah-iz-items-2023

TST2,%2Fshared%2FTest2%20Library%20blahblahblah%2Fblahblahblah-iz-items-2023
```

## Instructions for Using the Program

Once Configuration is Complete

You can run it for all: https://yourdomain.com/index.php?lib=ALL

Or just one institution: https://yourdomain.com/index.php?lib=TST1

(TST1 is the institution code)



Then you have 2 options:

### Option 1: Upload the NZ report

Since some group data doesn’t come through the API, to be as complete as possible, run and download this report for NZ electronic collections:

*	Log in to the network zone

*	Search with * for Electronic collection

*	Export

You probably want to rename the file with the date for uploading: nzalloct5.xls

### Option 2: Using API to get NZ electronic collection:

You can also run the program using only the API (without uploading the report) if you want to quickly get major electronic collections.

Whether you use option 1 or 2, once the program processes, click the link at the top to download the zip file of the reports. You can also choose or click who you want to email and then click the Send Email button.

### Notes

This program uses these API calls to receive NZ and IZ analytics reports:

NZ analytics report (replace 111222333_api_key_nz_111222333 with your network zone api key)

```
https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?apikey=111222333_api_key_nz_111222333&limit=1000&path=%2Fshared%2FMnPALS%20Consortium%20NZ%2001MNPALS_NETWORK%2FPals%2FJill%2Fnz-itemsjan27-allinst
```

IZ analytics report (replace 111222333_api_key_111222333 with your institution zone api key)

```
https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?apikey=111222333_api_key_111222333&limit=1000&path=%2Fshared%2FCommunity%2FReports%2FConsortia%2FMNPALS%2FWork%20in%20Process%2FIZitemsjan27
```

If you want to use your own reports, you must update the paths for your API calls in the program at:  

https://github.com/simonhm/IPEDS-E-Resources-Report/blob/1d2bb709bc25887b2061103e7dbec21f2207e7c6/index.php#L570

and 

https://github.com/simonhm/IPEDS-E-Resources-Report/blob/1923cd350766e20ad4cd73a85732525fe8f13534/index.php#L529

If you change the reports, you may need to customize the program.

## TO DO

* Improving the API option: check and get electronic collections' GROUPS under services combining with GROUPS under CDI. For now, the program is getting electronic collections' GROUPS under CDI.

## Maintainers/Sponsors

Current maintainers:

* [Simon Mai](https://github.com/simonhm)
* Jill Holman (documentation)
