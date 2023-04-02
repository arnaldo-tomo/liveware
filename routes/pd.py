# https://intellipaat.com/blog/tutorial/python-tutorial/scikit-learn-tutorial/
# https://www.youtube.com/watch?v=_RAi7eTZYmA
# https://www.youtube.com/watch?v=u8xgqvk16EA&list=PL5TJqBvpXQv5CBxLkdqmou_86syFK7U3Q
# https://www.youtube.com/watch?v=hvKI2kuuDeA
#importar bibliotecas
import sklearn
import pandas as pd
#import do data set iris
from sklearn.datasets import load_iris
from sklearn import tree
#floresta
from sklearn.ensemble import RandomForestClassifier
#dados de teste
from sklearn.model_selection import train_test_split
#buscar a acuracia
from sklearn.metrics import accuracy_score
#carregar datasets
iris=load_iris()
#verificar atributos data, DESCR, feature_names,
#filename, JPG, target, target_names
#print(iris.DESCR)
# print(iris.data)
# print(iris.feature_names)
# meus teste de LordIres
#processamento dos dados
x = iris.data #variaveis explicativas
y =iris.target #arrays de labels ou targets
#dividindo os dados em treino e teste (30%)
x_train, x_test, y_train, y_test = train_test_split(x,y,test_size=0.3)
#criacao de maquina preditiva
#para classificacao podem ser usados:
# 1- arvore de decisao
# 2-
#
maquina_preditiva = RandomForestClassifier(1000)
#maquina_preditiva = tree.DecisionTreeClassifier()


maquina_preditiva.fit(x_train,y_train)
#testar a maquina preditiva
valor_predito = maquina_preditiva.predict(x_test)
print(valor_predito)

#calculo de acuracia
acc = ((accuracy_score(valor_predito,y_test)))* 100
print(acc)
