#import requests
#user_id=12345
#url='https://ru.wikipedia.org/wiki/Список_объектов_NGC_(1-1000)'
#f=open('test.html','r')
#r=requests.get(url)
#print(r)
#f.write(str(r.text.encode('UTF-8')))
#f.write(str(r))
#with open('test.html', 'w') as f:
 #   f.write(r.text.encode('cp1251'))
#f.close()
#from urllib.request import urlopen
#import os
#import locale
#print("Дядька Ванька")
#os.environ["PYTHONIOENCODING"] = "utf-8"
#myLocale=locale.setlocale(category=locale.LC_ALL, locale="en_GB.UTF-8")
#import urlopen
#from bs4 import BeautifulSoup
#page=urlopen("https://ru.wikipedia.org/wiki/Список_объектов_NGC_(1-1000).html")
#contents=page.read()
#print(contents)
#contents=contents.encode('utf-8',errors='ignore')
#soup = BeautifulSoup(page,from_encoding="utf-8")
from urllib.request import urlopen
from urllib.error import HTTPError
from bs4 import BeautifulSoup
import sys
import os
import locale
#os.environ["PYTHONIOENCODING"] = "utf-8"
#myLocale=locale.setlocale(category=locale.LC_ALL, locale="en_GB.UTF-8")
try:
    html=urlopen("https://en.wikipedia.org/wiki/List_of_exoplanets_discovered_in_2015")
except HTTPError as e:
    print(e)
try:
    #f=open('test.html','w')
    #f.write(str(html.read()))
    #f.close()
    bsobj=BeautifulSoup(html,"html.parser")
    w=bsobj.find("table")
    List=w.findAll("td")
    List1=w.findAll("th")
    Spisok=[]
    for i in List1:
        Spisok.append(i.get_text())
    for i in List:
        Spisok.append(i.get_text())
    #print(Spisok)
    r=int(len(Spisok)/11); c=11;
    Tab=[]
    for i in range(r):
        Tab.append([])
    for i in range(r):
        for j in range(c):
            Tab[i].append("")
    st=0
    for i in range(r):
        for j in range(c):
            Tab[i][j]=Spisok[st]; st=st+1;
    for i in range(r):
        for j in range(c):
            v=""
            for k in range(len(Tab[i][j])):
                if(Tab[i][j][k]!='\n'):
                    v=v+Tab[i][j][k]
            Tab[i][j]=v
    print(Tab)
    #for child in bsobj.find("table",{"class":"wikitable plainrowheaders sortable jquery-tablesorter"}).children:
        #print(child)
    #title=bsobj.body.table
    #print(title)
except AttributeError as e:
    print(e)
