#Script para generar un txt de consultas para ingresar datos de las lenguas originarias de cada docente en la base de datos
#Autor: Etson Ronaldao Rojas Cahuana
#Fecha: 30/03/2022

import pandas as pd
from pyrsistent import v
df = pd.read_csv("c:/Users/etson/Desktop/TLenguas.csv", sep=';',low_memory=False)

for i in range(0,len(df)):
    f=open('text.txt',"a",encoding='utf8')
    indice_id = str(int(df['Id'].values[i]))
    Eva_L1 = str(int(df['Año Evaluación L1'].values[i]))
    Ven_L1 = str(int(df['Año vencimiento en el Registro L1'].values[i]))
    Lo_L1 = str(df['Lengua Originaria1'].values[i])
    Lo_Sv_L1 = str(df['Lengua Originaria1 sin variante'].values[i])
    DRE_EvaL1 = str(df['DRE EVAL ORAL L1'].values[i])
    UGEL_EvaL1 = str(df['UGEL EVAL ORAL L1'].values[i])
    OralL1 = str(df['ORAL_L1'].values[i])
    EscL1 = str(df['ESCRITO_L1'].values[i])
    Textito_2 = 'INSERT INTO `tlenguaoriginaria` VALUES ("'+indice_id+'","'+Eva_L1+'","'+Ven_L1+'","'+Lo_L1+'","'+Lo_Sv_L1+'","'+DRE_EvaL1+'","'+UGEL_EvaL1+'","'+OralL1+'","'+EscL1+'");\n'
    f.write(str(Textito_2))
    if str(int(df['NRO LENGUAS'].values[i])) == '2':
        # LENGUA ORIGINARIA 2
        Eva_L2 = str(int(df['Año Evaluación L2'].values[i]))
        Ven_L2 = str(int(df['Año vencimiento en el Registro L2'].values[i]))
        Lo_L2 = str(df['Lengua Originaria2'].values[i])
        Lo_Sv_L2 = str(df['Lengua Originaria2 sin variante'].values[i])
        DRE_EvaL2 = str(df['DRE EVAL ORAL L2'].values[i])
        UGEL_EvaL2 = str(df['UGEL EVAL ORAL L2'].values[i])
        OralL2 = str(df['ORAL_L2'].values[i])
        EscL2 = str(df['ESCRITO_L2'].values[i])
        Textito_2 = 'INSERT INTO `tlenguaoriginaria` VALUES ("'+indice_id+'","'+Eva_L2+'","'+Ven_L2+'","'+Lo_L2+'","'+Lo_Sv_L2+'","'+DRE_EvaL2+'","'+UGEL_EvaL2+'","'+OralL2+'","'+EscL2+'");\n'
        f.write(str(Textito_2))
    if str(int(df['NRO LENGUAS'].values[i])) == '3':
        # LENGUA ORIGINARIA 2
        Eva_L2 = str(int(df['Año Evaluación L2'].values[i]))
        Ven_L2 = str(int(df['Año vencimiento en el Registro L2'].values[i]))
        Lo_L2 = str(df['Lengua Originaria2'].values[i])
        Lo_Sv_L2 = str(df['Lengua Originaria2 sin variante'].values[i])
        DRE_EvaL2 = str(df['DRE EVAL ORAL L2'].values[i])
        UGEL_EvaL2 = str(df['UGEL EVAL ORAL L2'].values[i])
        OralL2 = str(df['ORAL_L2'].values[i])
        EscL2 = str(df['ESCRITO_L2'].values[i])
        Textito_2 = 'INSERT INTO `tlenguaoriginaria` VALUES ("'+indice_id+'","'+Eva_L2+'","'+Ven_L2+'","'+Lo_L2+'","'+Lo_Sv_L2+'","'+DRE_EvaL2+'","'+UGEL_EvaL2+'","'+OralL2+'","'+EscL2+'");\n'
        f.write(str(Textito_2))
        # LENGUA ORIGINARIA 3
        Eva_L3 = str(int(df['Año Evaluación L3'].values[i]))
        Ven_L3 = str(int(df['Año vencimiento en el Registro L3'].values[i]))
        Lo_L3 = str(df['Lengua Originaria3'].values[i])
        Lo_Sv_L3 = str(df['Lengua Originaria3 sin variante'].values[i])
        DRE_EvaL3 = str(df['DRE EVAL ORAL L3'].values[i])
        UGEL_EvaL3 = str(df['UGEL EVAL ORAL L3'].values[i])
        OralL3 = str(df['ORAL_L3'].values[i])
        EscL3 = str(df['ESCRITO_L3'].values[i])
        Textito_2 = 'INSERT INTO `tlenguaoriginaria` VALUES ("'+indice_id+'","'+Eva_L3+'","'+Ven_L3+'","'+Lo_L3+'","'+Lo_Sv_L3+'","'+DRE_EvaL3+'","'+UGEL_EvaL3+'","'+OralL3+'","'+EscL3+'");\n'
        f.write(str(Textito_2))
    f.close()    