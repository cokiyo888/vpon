# -*- coding: utf-8 -*-

from bokeh.plotting import figure, show, output_file
from bs4 import BeautifulSoup as bs
import requests
import pandas as pd


W_ID = []
W_Pcount = []
url = "http://localhost:1182/about.php"

content = requests.get(url).text

parse = bs(content, "html.parser")
data1 = parse.find(id="aboutTable")
rows = data1.find_all("tr")

for row in rows:
    cols = row.find_all("td")
    if len(cols) > 0:
        print(cols[0].text);
        print(cols[3].text);
        W_ID.append(cols[0].text)
        W_Pcount.append(cols[3].text)
       
                      

p = figure(width=800, height=400, title="g04",responsive=True)

#p.title_text_font_size = "20pt"
p.yaxis.axis_label = "humidity"
p.xaxis.axis_label = "date"

p.line(W_ID, W_Pcount, line_width = 2)

output_file("humidity.html")
show(p)