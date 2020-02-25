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
import re
import sqlite3
import xml.dom.minidom as minidom
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
    #print(Tab)
    conn=sqlite3.connect('kosm_ob_ty.db')
    cur=conn.cursor()
    cur.execute("CREATE TABLE plan (kod_plan INTEGER NOT NULL Primary Key,name VARCHAR2(50), mass_MJ VARCHAR2(50), radius_RJ VARCHAR2(50), Period_days VARCHAR2(50), semi_major_axis_AU VARCHAR2(50), temp_K VARCHAR2(50), discovery_method VARCHAR2(50), distance_ly VARCHAR2(50), host_star_mass_M_Sun VARCHAR2(50), host_star_temp_K VARCHAR2(50), remarks VARCHAR2(50))")
    for i in range(1,r):
        qu="INSERT INTO plan VALUES("+str(i)+","
        for j in range(c):
            qu=qu+"'"+Tab[i][j]+"',"
        qu=qu+")"
        qu1=""
        for j in range(len(qu)):
            if(j!=len(qu)-2):
                qu1=qu1+qu[j]
        qu=qu1
        cur.execute(qu)
    cur.execute("Select * from plan")
    rows1=cur.fetchall()
    for i in rows1:
        print(i)
    conn.commit()
    cur.close()
    conn.close()
        #print(qu)
    #cur.execute("INSERT INTO gal VALUES(1, 'Mlechnyy_Put','','0','6*10^42 kg')")
    #for child in bsobj.find("table",{"class":"wikitable plainrowheaders sortable jquery-tablesorter"}).children:
        #print(child)
    #title=bsobj.body.table
    #print(title)
except AttributeError as e:
    print(e)
