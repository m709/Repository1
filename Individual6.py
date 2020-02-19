import re
import sqlite3
import xml.dom.minidom as minidom
#def getInf(xml):
    #Выводим все заголовки из xml.
    #galaxies = doc.getElementsByTagName("galaktika")
    #data = []
    #for galaxy in galaxies:
       # galaxy_id = galaxy.getAttribute("id")
      #  nazvaniye = galaxy.getElementsByTagName("nazvaniye")[0].firstChild.nodeValue
     #   sozvezdiye = galaxy.getElementsByTagName("sozvezdiye")[0].firstChild.nodeValue
    #    rasstoyaniye = galaxy.getElementsByTagName("rasstoyaniye")[0].firstChild.nodeValue
   #     massa = galaxy.getElementsByTagName("massa")[0].firstChild.nodeValue
  #      data.append([galaxy_id, nazvaniye, sozvezdiye, rasstoyaniye, massa])
 #   return data

#if __name__ == "__main__":

    #doc = minidom.parse('example.xml')
    #data = getInf(doc)
#print(data)

conn=sqlite3.connect('kosm_ob_ty.db')
cur=conn.cursor()
# f=open('example.xml','r')
# l=f.readlines()
#print(l)
print('/////////////////////////')
cur.execute("CREATE TABLE gal (kod_gal        INTEGER NOT NULL Primary Key,nazvaniye      VARCHAR2(50),sozvezdiye     VARCHAR2(50),rasstoyaniye   VARCHAR2(50),massa          VARCHAR2(50))")
cur.execute("PRAGMA foreign_keys = ON")
cur.execute("CREATE TABLE zv (kod_zv         INTEGER NOT NULL Primary Key,nazvaniye      VARCHAR2(50),sozvezdiye     VARCHAR2(50),massa          VARCHAR2(50),rasstoyaniye   VARCHAR2(50), gal_kod_gal Integer Not Null References gal(kod_gal))")
cur.execute("CREATE TABLE plan (kod_plan         INTEGER NOT NULL Primary Key,nazvaniye        VARCHAR2(50),rasstoyaniye     VARCHAR2(50),massa            VARCHAR2(50),zv_kod_zv        INTEGER NOT NULL References zv(kod_zv),zv_gal_kod_gal   INTEGER NOT NULL References gal(kod_gal))")
cur.execute("CREATE TABLE sp (kod_sp                INTEGER NOT NULL Primary Key,nazvaniye             VARCHAR2(50),rasstoyaniye          VARCHAR2(50),massa                 VARCHAR(50),plan_zv_kod_zv        INTEGER NOT NULL References zv(kod_zv),plan_zv_gal_kod_gal   INTEGER NOT NULL References gal(kod_gal),plan_kod_plan         INTEGER NOT NULL References plan(kod_plan))")
                                                                                                                                                                                #?
#f=open("fil.txt",'r')
#l=f.readlines()
#l1=[]
#l2=[]
#for i in l:
    #s=''
    #l1=[]
    #for j in range(len(i)-1):
      #  if((i[j]==' ')and(i[j+1]==' ')and(s!='')):
     #       l1.append(s)
    #        s=''
   #     else:
  #          s=s+i[j]
 #   l2.append(l1)
#for i in range(len(l2[0])):
 #   print(l2[0][i])
#print(l1)
#print(l)
#print (l2)
#f.close()
#cur.execute("INSERT INTO gal VALUES("+ str(int(l2[0][0])) +", '"+ str(l2[0][1]) +"', '"+ str(l2[0][2]) +"', '"+ str(l2[0][3]) +"', '"+ str(l2[0][4]) +"')")
#cur.execute("SELECT * from gal")
#rows5=cur.fetchmany()
#for note in data:
 #   cur.execute("INSERT INTO gal VALUES("+ str(int(note[0])-7) +", '"+ str(note[1]) +"', '"+ str(note[2]) +"', '"+ str(note[3]) +"', '"+ str(note[4]) +"')")

cur.execute("INSERT INTO gal VALUES(1, 'Mlechnyy_Put','','0','6*10^42 kg')")
cur.execute("INSERT INTO gal VALUES(2, 'Bolshoe_Magellanovo_Oblako','Zolotaya_Ryba','okolo_163000_sv_let','10^10_mass_Solntsa')")
cur.execute("INSERT INTO gal VALUES(3, 'Maloe_Magellanovo_Oblako','Tukan','197000+/-9000_sv_let','?')")
cur.execute("INSERT INTO gal VALUES(4, 'Galaktika_Andromedy','Andromeda','2.52+/-0.14_mln_sv_let','800+/-100_mlrd_mass_Solntsa')")
cur.execute("INSERT INTO gal VALUES(5, 'Galaktika_Treugolnika','Treugolnik','2.77-3.07_mln_sv_let','v_5-10_raz_menshe_Mlechnogo_Puti')")
cur.execute("INSERT INTO gal VALUES(6, 'Serebryanaya_Moneta','Skulptor','okolo_8_mln_sv_let','?')")

cur.execute("INSERT INTO zv VALUES(1, 'Solntse','','1.9885*10^30_kg','149.6_mln_km',1)")
cur.execute("INSERT INTO zv VALUES(2, 'Alfa_Volka','Volk','10-11_mass_Solntsa','550_sv_let',1)")
cur.execute("INSERT INTO zv VALUES(3, 'Gamma_Vorona','Voron','?','165_sv_let',1)")
cur.execute("INSERT INTO zv VALUES(4, 'Kepler-20','Lira','91%_massy_Solntsa','945_sv_let',1)")
cur.execute("INSERT INTO plan VALUES(1, 'Zemlya','0','5.9726*10^24_kg',1,1)")
cur.execute("INSERT INTO plan VALUES(2, 'Neptun','ot_4.3_do_4.6_mlrd_km','1.0243*10^26_kg',1,1)")
cur.execute("INSERT INTO plan VALUES(3, 'Kepler-20 f','945_sv_let','0.66_massy_Zemli',4,1)")
cur.execute("INSERT INTO sp VALUES(1, 'Luna','384467_km','7.3447*10^22_kg',1,1,1)")
cur.execute("INSERT INTO sp VALUES(2, 'Triton','ot_4.3_do_4.6_mlrd_km','2.14*10^22_kg',1,1,2)")
cur.execute("Select * from zv,gal where zv.gal_kod_gal=gal.kod_gal")
rows1=cur.fetchall()
cur.execute("Select gal.nazvaniye,zv.nazvaniye,zv.rasstoyaniye from zv,gal where zv.gal_kod_gal=gal.kod_gal")
rows2=cur.fetchall()
cur.execute("Select gal.nazvaniye,gal.rasstoyaniye from gal")
rows3=cur.fetchall()
cur.execute("Select * from zv,plan where zv.kod_zv=plan.zv_kod_zv")
rows4=cur.fetchall()

#cur.execute("INSERT INTO gal VALUES(7, l1[0],l2[0],l3[0],l4[0])")
print("1")
for i in rows1:
    print(i)
print("2")
for i in rows2:
    print(i)
print("3")
for i in rows3:
    x=re.findall(r"mln_sv_let",str(i))
    if(len(x)==1):
        print(i)
print("4")
for i in rows4:
    print(i)
#print("5")
#for i in rows5:
 #   print(i)
conn.commit()
cur.close()
conn.close()
