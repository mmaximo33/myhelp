#####################################################################################################
ADICIONALES
-----------------------------------------------------------------------------------------------------
php app/console list                                                            Lista de acciones por consola

php bin/console debug                                                           Cosas que puedes (routing/twig/confg)


#####################################################################################################
CREACION DE BUNDLE
http://symfony.com/doc/current/book/bundles.html
https://librosweb.es/libro/symfony_2_x/capitulo_4/el_sistema_de_bundles.html
-----------------------------------------------------------------------------------------------------
php app/console generate:bundle                                                 Creacion del Bundle
    Are you planning on sharing this bundle across multiple applications? [no]: Usar en bundle en otra app
    Bundle name: BackEndBundle                                                  Nombre del bundle
    Target Directory [src/]: src/                                               Ubicacion
    Configuration format (annotation, yml, xml, php) [annotation]:              Formato para ruteo

Se crean los siguientes archivos
    src\MyNewBundle                                                             Carpeta contenedora
    src\MyNewBundle\Controller\DefaulController.php                             Carpeta y ejemplo de controller
    src\MyNewBundle\Entity                                                      Carpeta para entidades
    src\MyNewBundle\Repository                                                  Carpeta para repo de entidades
    src\MyNewBundle\Resources                                                   Carpeta de recursos
        src\MyNewBundle\Resources\config                                        Configuraciones routing/services
        src\MyNewBundle\views\Default                                           Carpeta para poner vistas
    src\MyNewBundle\Test                                                        Carpeta para pruebas
    src\MyNewBundle\MyNewBundle.php                                             Archivo llamado del AppKernel.php
Se Edita los siguientes archivos
    app\AppKernel.php                                                           Al final del 1er array
    app\config\rounting.yml                                                     Confir para encontrar ruteos del bundle
    

    
#####################################################################################################
DOCTRINE
http://www.doctrine-project.org/
https://librosweb.es/libro/symfony_2_x/capitulo_8.html
-----------------------------------------------------------------------------------------------------
CREACION ENTIDAD
--------------------------
php bin/console doctrine:generate:entities                                      Creacion de entidad
    The Entity shortcut name: AppBundle:MyEntidad                               NameSpace de la entidad
    Configuration format (yml, xml, php, or annotation) [annotation]:           Como se va a definir
    New field name (press return to stop adding fields):                        Nombre del campo
    Field type [string]:                                                        Tipo de campo
    Field length [255]:                                                         Largo
    Is nullable [false]:                                                        Puede ser nulo
    Unique [false]:                                                             Valor unico
    
Esto crea dos archivos sobre:
    Src\AppBundle\Entity\MyEntidad.php: Contiene mapeo de la tabla y metodos SET/GET
    Src\AppBundle\Repository\MyEntidadRepository.php: Puedes preparar los propios metodos 


**Atajo rapido.
php app/console doctrine:generate:entity
      --entity="AppBundle:MyEntidad"
      --fields="name:string(255)"

      
INTERESANTES
--------------------------
php app/console doctrine:database:drop --force                                  Borrar DB
php app/console doctrine:database:create                                        Crear DB

php app/console doctrine:schema:update --force                                  Crear/Actualizar esquema


*** TENER EN CUENTA ****
Para que las bases siembre se creen como UTF8 agrear las siguientes lineas
en el archivo 
my.ini apacha
    collation-server = utf8_general_ci
    character-set-server = utf8

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

    



    


