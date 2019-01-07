DELIMITER $$
CREATE PROCEDURE addProductoToOrder(IN orden int, IN producto int,IN adicional int, OUT ok int)
    BEGIN
        DECLARE x INT default 0;

        IF adicional != 0 THEN
        	SELECT cantidad INTO x
	        FROM ordenes_productos 
	        WHERE   id_orden = orden AND
	                id_producto = producto AND
	                id_adicional = adicional;

	        SELECT COUNT(*) INTO ok
	        FROM ordenes_productos 
	        WHERE   id_orden = orden AND
	                id_producto = producto AND
	                id_adicional = adicional;

	 		set x= x+1;
	        UPDATE ordenes_productos
	        SET cantidad = x
	        WHERE id_orden = orden AND
	        id_producto = producto AND
	        id_adicional = adicional;
        ELSE
			SELECT cantidad INTO x
	        FROM ordenes_productos 
	        WHERE   id_orden = orden AND
	                id_producto = producto;

	        SELECT COUNT(*) INTO ok
	        FROM ordenes_productos 
	        WHERE   id_orden = orden AND
	                id_producto = producto

	 		set x= x+1;
	        UPDATE ordenes_productos
	        SET cantidad = x
	        WHERE id_orden = orden AND
	        id_producto = producto;
        END IF;
    END$$