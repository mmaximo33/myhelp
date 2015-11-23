#####################################################################################################
CREACION DE BUNDLE
-----------------------------------------------------------------------------------------------------
Lo primero que debemos hacer el es crear el directorio 
de nuestra aplicacion

symfony/src/MyProyect

luego vamos a crear nuestro bundle por medio de la consola
php app/console generate:bundle

Esto nos pedida varios datos
1.namespace 
    Debemos poner la direccion del bundler desde la carpeta src "MyProyect/MyBundle"
2.Nombre identificado del bundle
    Aceptamos lo recomendado "MyProyectNombreBundle"
3.Direccion del bundle
    Aceptamos lo recomendado src/
4.Formato de config del bundle
    Propone "annotations" pero cambios a "yml" (guardado en src/MyProyect/MyBundle/Resources/config/routing.yml)
5.Pregunta si genera estructura completa
    Le decimos que no
6.Si todo esta vine confirmamos
7.Registrar bundle en app/AppKernel.php?
    Le decimos que si
8.Actualizar el app/config/routing.yml 
    Le decimos que si
#####################################################################################################
CREACION DE ENTITY
-----------------------------------------------------------------------------------------------------
php app/console generate:doctrine:entity 
The Entity shortcut name: ASPHUTestBundle:Auditorias
Identidicador del bundle:Nombre Entidad


#####################################################################################################
CREACION DE PAGINAS
-----------------------------------------------------------------------------------------------------
1.Asignacion de una ruta MyProyecto/myBundle/Resources/config/routing.yml
2.Creacion metodo (Action) MyProyecto/myBundle/controller/MyController.php
3.Creacion de la plantilla MyProyecto/myBundle/Resources/view/Mypage.html.twig

#####################################################################################################
ENRUTAMIENTO
-----------------------------------------------------------------------------------------------------
1.Controlador frontal (app.php o app_dev)
2. app/config/routing.yml 

myproyect_demo:
    resource: "@MyproyectMyBundle/Resources/config/routing.yml"
    prefix:   /
    
myproyect_demo: Nombre identificatorio que unico e irrepetible en toda la aplicacion
resource: ruta absoluta del donde se encuentra el routing de este bundle
prefix: Prefijo para ingresar a las rutas que estan dentro del routing de cada bundle
    
3. /src/MyProyect/MyBundle/Resources/config/routing.yml

4.Seteo de rutas a cada controladores

myproyect_demo_homepage: 
    path:     /home
    defaults: { _controller: MyproyectMyBundle:Default:index }

myproyect_demo_homepage: Referencia para llamar de cualquier lado de la applicacion (Debe ser unico e irrepetible)
path: ruta relativa con la cual le pegaremos al controller->action.
defaults: ruta absoluta del controller->acttion que le pegaremos

Podemos hacer que esta url reciba parametros para llamarla por ejemplo misitio/page/1
myproyect_demo_homepage: 
    path:     /page/{page} 
    defaults: { _controller: MyproyectMyBundle:Default:index, page: 1 }

path: Agregamos entre llaves el nombre de la variable que va a recibir.
defaults: Luego del la ruta de la accion, pasamos el valor default en caso de que no venga este dato.

Expresiones regulares como parametro
myproyect_demo_homepage: 
    path:     /page/{page} 
    defaults: { _controller: MyproyectMyBundle:Default:index, page: 1 }
    requirements: 
        page: \d+
Con requirements podemos decir que tipos de variable esperamos

    



    


