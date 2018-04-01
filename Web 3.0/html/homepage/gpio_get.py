import urllib2
button_status = urllib2.urlopen("http://38.88.74.88/homepage/button_stat_get.php").read()
print button_status