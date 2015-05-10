# scotreg
Scottish Parishes and Registration Districts

##Purpose
This repo aims to build an open data, freely reusable, machine readable, file
of the parishes and registration districts in Scotland, and their codes.

##Source
The initial data is from the
[National Records of Scotland](http://www.nrscotland.gov.uk/research/guides/statutory-registers/registration-districts).

It is licenced under the [Open Government Licence v3.0](http://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/).

However, the data is only available from the National Records of Scotland (NRS) as 
a PDF file.  The text of the pdf is not directly usable to populate files and spreadsheets.

A copy of the pdf, from 2015-05-09 is in `data/registration-district-guide.pdf`.

##Process

The text of the pdf has been extracted (with `pdftotext` including layout).  This
leaves a random number of spaces between each field, and no indication of missing fields.
It is in `data/registration-district-guide.txt`.

The program `makecsv.php` (requires command-line PHP) in `src/` takes this text file 
and attempts to identify the fields, and put the results in a CSV file (tab delimited).

##Results

The result is in `data/scotreg.tsv`.  This is very much a first pass, and will contain errors.

The columns are:

* place
* county
* start year
* end year
* type (of old district)
* old district
* old district suffix
* current registration district
* current reg dist, end of range

Corrections are very welcome, either by raising an issue, or by a pull request.

##Roadmap

Plans include (if time is available - help welcome!):

* add details of the major cities from the appendixes of the NRS file (when available, see issue #1).
* geocode places to their central point location, using an open data source for the co-ordinates such as OS Opennames.
* build lists of "nearby" parishes for each parish.
* add GIS borders for the parishes, where possible (and allow for historical changes).
* add metadata for the parishes, such as census counts, and registration counts

##Licences

The pdf file is licensed by NRS under the Open Government License

The txt and csv files are licensed by Open The Past under the [CC BY 4.0](http://creativecommons.org/licenses/by/4.0/) license.  In other
words, if you use the files, please attribute (cite) this repo as the source.

Programs are under the [MIT License](http://opensource.org/licenses/MIT).







