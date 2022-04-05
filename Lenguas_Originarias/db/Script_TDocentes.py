#Script para generar un txt de consultas para ingresar datos de cada docente en la base de datos
#Autor: Etson Ronaldao Rojas Cahuana
#Fecha: 30/03/2022

import pandas as pd
from pyrsistent import v
df = pd.read_csv("c:/Users/etson/Desktop/TDocentes.csv", sep=';', dtype = str)

for i in range(0,len(df)):
    f=open('Datos_docentes.txt',"a",encoding='utf8')
    indice_id = str(int(df['Id'].values[i]))
    Tipo_Doc = str(df['Tipo Documento'].values[i])
    Nro_Doc = str(df['DNI'].values[i])
    APater = str(df['Apellido Paterno'].values[i])
    AMater = str(df['Apellido Materno'].values[i])
    Nombres = str(df['Nombres'].values[i])
    Anio_RNDBLO = str(df['Año ingreso al RNDBLO'].values[i])
    Nro_Len = str(df['NRO LENGUAS'].values[i])
    Textito_Docente = 'INSERT INTO `tdocente_rndblo` VALUES ("'+indice_id+'","'+Tipo_Doc+'","'+Nro_Doc+'","'+APater+'","'+AMater+'","'+Nombres+'","'+Anio_RNDBLO+'","'+Nro_Len+'");\n'
    f.write(str(Textito_Docente))
    f.close()