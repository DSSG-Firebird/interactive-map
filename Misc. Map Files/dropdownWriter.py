import csv

# Read in raw data from csv
rawData = csv.reader(open('Classification_types.csv', 'rb'))   # Change this to the name of the .csv file you are reading in.

# the template. where data from the csv will be formatted.  If you don't want to include the numeric value of the counts, delete the %s in ().
template = \
    ''' \
    <option value="%s">%s (%s)</option>
    '''

# the head of the geojson file
output = \
    ''' \
    '''

# loop through the csv by row skipping the first
iter =0;
for row in rawData:
    iter += 1
    if iter >= 2:  # change this to 1 if you DON'T want it to skip the first, header row
        sic = row[0] # change this to whichever column you want it to include
        num = row[1] # delete this if you don't have a count of the businesses of this type, or don't want to include that in the dropdown.
        output += template % (row[0], row[0], row[1])  # If you've removed the numeric counts, be sure to also delete row[1] here as well.
        
# the tail of the  file
output += \
    ''' \
    '''
    
# opens an HTML file to write the output to. 
outFileHandle = open("output.html", "w")
outFileHandle.write(output)
outFileHandle.close()