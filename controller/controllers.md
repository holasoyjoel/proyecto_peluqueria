# CONTROLADORES - (*resumen de su actividades*)

## **Cliente**
* ### Se importa el modelo ``cliente.model``

* ### Se crea la clase ``ClienteController``

* ### Constructor instancia el modelo 

* ### La función ``Index()`` muestra el **menu** y la principal de **clientes**

* ### La función ``Crud()`` obtiene el **id** de la request si este existe y muestra el menu y el formulario para un nuevo cliente o para editar el cliente.

* ### La función ``Guardar()`` extraer los datos correspondiente del cliente y llama a método ``actualizar`` o ``registrar`` del modelo dependiendo  si existe o no el *id* en la request

* ### La función ``Filtrar()`` extrae el término por el cual se buscara al cliente, llama al método ``filtrar`` del modelo y por ultimo muestra el **menu** y la pantalla principal de **clientes**

* ### La funcion ``eliminar()`` extrae el *id* de la request y llama al método ``eliminar`` del modelo

---

## **Peluquero**
* ### Se importa el modelo ``peluquero.model``

* ### Se crea la clase ``PeluqueroController``

* ### Constructor instancia el modelo 

* ### La función ``Index()`` muestra el **menu** y la principal de **peluqueros**

* ### La función ``Crud()`` obtiene el **id** de la request si este existe y muestra el menu y el formulario para un nuevo peluquero o para editar el peluquero.

* ### La función ``Guardar()`` extraer los datos correspondiente del peluquero y llama a método ``actualizar`` o ``registrar`` del modelo dependiendo  si existe o no el *id* en la request


* ### La funcion ``eliminar()`` extrae el *id* de la request y llama al método ``eliminar`` del modelo

---

## **Trabajo**
* ### Se importa el modelo ``trabajo.model``

* ### Se crea la clase ``TrabajoController``

* ### Constructor instancia el modelo 

* ### La función ``Index()`` muestra el **menu** y la principal de **trabajos**

* ### La función ``Crud()`` obtiene el **id** de la request si este existe y muestra el menu y el formulario para un nuevo trabajo o para editar el trabajo.

* ### La función ``Detalle()`` obtiene el **id** de la request y llama al método ``obtener`` del modelo, mostrando el **menu** y la pantalla detalle del **trabajo**

* ### La función ``Guardar()`` extraer los datos correspondiente del trabajo y llama a método ``actualizar`` o ``registrar`` del modelo dependiendo  si existe o no el *id* en la request

* ### La función ``Filtrar()`` extrae el término por el cual se buscaran ls trabajos, llama al método ``filtrar`` del modelo y por ultimo muestra el **menu** y la pantalla principal de **trabajos**

* ### La funcion ``eliminar()`` extrae el *id* de la request y llama al método ``eliminar`` del modelo


---
## **Menu**

* ### La función ``Index()`` muestra el **menu** y la pantalla de **home**


