Evaluation base de données partie 2
1- Liste des contacts français
SELECT companyname,contactname,contacttitle,phone FROM customers WHERE country='France'

2-Produits vendus par le fournisseur «Exotic Liquids»:
SELECT productname, unitprice from products WHERE supplierid='1'

3-Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant:
SELECT CompanyName, SupplierID, COUNT(*) as "Nb Commandes"
    FROM products NATURAL JOIN suppliers WHERE SupplierID IN('18','27','28')
    GROUP BY SupplierID
    ORDER BY 3 DESC

4-Liste des clients Français ayant plus de 10 commandes:


5 -Liste des clients ayant un chiffre d’affaires > 30.000:

SELECT CompanyName, SUM(UnitPrice*Quantity) as CA, Country
FROM Customers
JOIN Orders on Orders.CustomerID = Customers.CustomerID
JOIN Order_Details on Order_Details.OrderID = Orders.OrderID 
GROUP BY CompanyName,Country
HAVING SUM(UnitPrice*Quantity) > 30000
ORDER BY CA DESC

6–Liste des pays dont les clients ont passé commande de produits fournis par «Exotic Liquids»:
SELECT ShipCountry
FROM Orders
JOIN Order_Details on Order_Details.OrderID = Orders.OrderID 
JOIN Products on Products.ProductID = Order_Details.ProductID
JOIN Suppliers on Suppliers.SupplierID = Products.SupplierID
WHERE CompanyName = 'exotic liquids'
GROUP BY ShipCountry

7-Montant des ventes de 1997:
SELECT SUM(UnitPrice*Quantity) as 'Montant des ventes 97'
FROM Order_Details
JOIN Orders on orders.OrderID = Order_Details.OrderID
WHERE YEAR(OrderDate) = 1997

8-Montant des ventes de 1997 mois par mois:
SELECT MONTH(ORDERDate)as 'Mois 97', SUM(UnitPrice*Quantity) 'Montant des ventes 97'
FROM Order_Details
JOIN Orders on orders.OrderID = Order_Details.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY MONTH(ORDERDATE)

9-Depuis quelle date le client «Du monde entier» n’a plus commandé?
SELECT MAX(OrderDate)
FROM Orders
Join Customers on Customers.CustomerID = orders.CustomerID
WHERE CompanyName = 'Du monde entier'
10 –Quel est le délai moyen de livraison en jours?
SELECT ROUND (AVG(DATEDIFF( shippeddate,orderdate ))) AS 'Délai moyen livraison jours'
FROM orders
