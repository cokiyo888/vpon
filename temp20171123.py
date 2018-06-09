# -*- coding: utf-8 -*-

from bokeh.plotting import figure, show, output_file
from bs4 import BeautifulSoup as bs
import requests
import pandas as pd


W_ID = []
W_Pcount = []
url = "http://140.130.19.38:58136/~g04/about.php"

content = requests.get(url).text

parse = bs(content, "html.parser")
data1 = parse.find(id="aboutTable")
rows = data1.find_all("tr")

for row in rows:
    cols = row.find_all("td")
    if len(cols) > 0:
        print(cols[2].text);
        print(cols[4].text);
        W_ID.append(cols[2].text)#x
        
        import time
        W_Time = time.strptime('00:00:00','%H:%M:%S')
             
        time.mktime(W_Time)
        
        W_Pcount.append(cols[4].text)#y
        
        
       
                      

p = figure(width=300, height=200, title="g04",responsive=True)

#p.title_text_font_size = "20pt"
p.yaxis.axis_label = "humidity"
p.xaxis.axis_label = "W_ID"

p.line(W_ID, W_Pcount, line_width = 3)

output_file("humidity.html")
show(p)