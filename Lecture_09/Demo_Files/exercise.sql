select ProductName, QuantityPerUnit from products;
select ProductID, ProductName, UnitPrice from products;
select ProductID, ProductName, UnitPrice from products WHERE Discontinued=b'1';
select ProductID, ProductName, UnitPrice from products WHERE UnitPrice = (SELECT MAX(UnitPrice) from products);
select ProductID, ProductName, UnitPrice from products WHERE UnitPrice = (SELECT MIN(UnitPrice) from products);
select ProductID, ProductName, UnitPrice from products WHERE UnitPrice<20 Order By UnitPrice Desc limit 10;
select ProductID, ProductName, UnitPrice from products WHERE UnitPrice Between 20 and 30;
select t1.ProductID, t1.UnitPrice from products t1 WHERE t1.UnitPrice > (SELECT avg(UnitPrice) from products);
select t1.ProductID, t1.ProductName, t1.UnitPrice from products t1 ORDER BY UnitPrice DESC LIMIT 10;
select t1.CategoryName, t2.ProductName, t2.UnitPrice, t2.UnitsInStock from categories as t1, products as t2 where t1.CategoryID=t2.CategoryID and t2.UnitPrice>25 ORDER BY CategoryName ASC, UnitPrice DESC;
select t2.ProductName, sum(t1.Quantity) as TotalOrderQuantity,t2.UnitsInStock from `order details` as t1, products as t2 where t1.ProductID=t2.ProductID and t1.Quantity>t2.UnitsInStock and t1.UnitPrice>(SELECT AVG(UnitPrice) from products) Group by ProductName ORDER by (sum(t1.Quantity)-UnitsInStock) DESC;