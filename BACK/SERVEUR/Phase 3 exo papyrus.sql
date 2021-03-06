Phase 3 exo papyrus
1) Ok
SELECT NUMCOM from ENTCOM where NUMFOU = '9120'

2) Ok
SELECT NUMFOU, numcom as 'nombre de commandes' from ENTCOM 

3) Ok
SELECT numcom as 'nombre de commande',  numfou as 'nombre de fournisseur' from ENTCOM  
4) Ok
SELECT codart,libart,stkphy,stkale,QTEANN from PRODUIT WHERE STKPHY <= STKALE and QTEANN < 1000 

5) Ok
SELECT nomfou, substring(posfou,1,2) as 'Départements' from fournis where substring(posfou,1,2) in ('75', '78', '92', '77') order by posfou desc, nomfou
6) Ok
SELECT NUMCOM, DATCOM from ENTCOM WHERE MONTH(DATCOM) = 3 or MONTH(DATCOM) = 4

7) Ok
SELECT NUMCOM,DATCOM from ENTCOM WHERE OBSCOM not LIKE ''

8) Ok
SELECT NUMCOM,  as TOTAL from LIGCOM  GROUP BY NUMCOM ORDER BY TOTAL DESC
 
9) Ok
SELECT NUMCOM AS 'total'
from LIGCOM 
WHERE QTECDE < 1000 AND (QTECDE*PRIUNI)>10000
GROUP BY NUMCOM 


10) Ok
SELECT nomfou,DATCOM,NUMCOM from FOURNIS,ENTCOM WHERE entcom.NUMFOU = fournis.NUMFOU

11) A revoir!
SELECT entcom.NUMCOM,nomfou,libart,
FROM ENTCOM,FOURNIS,LIGCOM,PRODUIT
WHERE OBSCOM LIKE 'urgent%' and entcom.NUMFOU = FOURNIS.NUMFOU and ENTCOM.NUMCOM = LIGCOM.NUMCOM and produit.CODART = LIGCOM.CODART
GROUP BY ENTCOM.NUMCOM,NOMFOU,LIBART

12) 1/2 façons de faire
SELECT nomfou
FROM ENTCOM,FOURNIS,LIGCOM
WHERE entcom.NUMFOU = FOURNIS.NUMFOU and ENTCOM.NUMCOM = LIGCOM.NUMCOM  and QTELIV >= 1
GROUP BY NOMFOU


13) A revoir !0/2 façons de faire
SELECT numcom,datcom 
FROM ENTCOM
WHERE numfou in ENTCOM.NUMCOM is 09120
group by NUMCOM,DATCOM


14) Ok
SELECT libart,prix1
FROM VENTE,PRODUIT
WHERE produit.CODART = vente.CODART and STKPHY > 0 and PRIX1 < (
select min(prix1) from VENTE,PRODUIT 
where produit.CODART = vente.CODART and LIBART  Like 'R%' )
GROUP BY LIBART,PRIX1

15) Ok
SELECT LIBART,FOURNIS.NUMFOU
from PRODUIT,FOURNIS, VENTE
WHERE FOURNIS.NUMFOU = VENTE.NUMFOU and vente.CODART = PRODUIT.CODART and STKPHY <= (
SELECT SUM(STKALE * 1.5) 
from PRODUIT
WHERE STKALE > 0 and STKPHY > 0 )
ORDER BY libart,numfou

16) Ok
SELECT LIBART,FOURNIS.NUMFOU
from PRODUIT,FOURNIS, VENTE
WHERE FOURNIS.NUMFOU = VENTE.NUMFOU and vente.CODART = PRODUIT.CODART and STKPHY <= (
SELECT SUM(STKALE * 1.5) 
from PRODUIT
WHERE STKALE > 0 and STKPHY > 0 and DELLIV < 30)
ORDER BY NUMFOU,libart

17) Ok
SELECT FOURNIS.NUMFOU,LIBART,STKALE
from PRODUIT,FOURNIS, VENTE
WHERE FOURNIS.NUMFOU = VENTE.NUMFOU and vente.CODART = PRODUIT.CODART and STKPHY <= (
SELECT SUM(STKALE * 1.5) 
from PRODUIT
WHERE STKALE > 0 and STKPHY > 0 and DELLIV < 30)
ORDER BY STKALE DESC

18) A revoir!
SELECT LIBART, SUM (QTECDE) as Quantite 
FROM PRODUIT,LIGCOM
WHERE PRODUIT.CODART = LIGCOM.CODART
GROUP BY LIBART, QTEANN
HAVING (QTEANN * 0.90) < SUM (QTECDE)

19) A revoir ! 
SELECT NUMFOU, SUM (QTECDE * PRIUNI *1.20) as prixttc
FROM LIGCOM,ENTCOM
WHERE ENTCOM.NUMCOM = LIGCOM.NUMCOM
GROUP BY NUMFOU

1) Ok

UPDATE VENTE
SET PRIX1 = PRIX1*1.04, PRIX2 = PRIX2 *1.02
WHERE NUMFOU = 9180

2) Ok
UPDATE VENTE
SET PRIX2=PRIX1
WHERE PRIX2 is null 

3) A revoir!
UPDATE ENTCOM 
SET OBSCOM = '*****'
FROM entcom
JOIN FOURNIS
ON ENTCOM.NUMFOU = FOURNIS.NUMFOU 
WHERE SATISF <5


4) A revoir!

DELETE from VENTE
FROM VENTE
JOIN PRODUIT
on PRODUIT.CODART = VENTE.CODART
WHERE produit.CODART = 'l110'

DELETE from LIGCOM
FROM LIGCOM
JOIN PRODUIT
on PRODUIT.CODART = ligcom.CODART
WHERE produit.CODART = 'l110'

DELETE from produit
FROM produit
WHERE produit.CODART = 'l110'
