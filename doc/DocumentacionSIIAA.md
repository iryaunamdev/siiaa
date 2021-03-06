# Documentaci贸n SIIAA

Created: June 13, 2022 1:38 PM
Last Edited Time: June 13, 2022 3:14 PM
Stakeholders: Anonymous
Status: In Progress 馃檶
Type: Documentation

# Introducci贸n

El Sistema Integral de Informaci贸n Acad茅mica y Administrativa (SIIAA), es un sistema que re煤ne la informaci贸n producida por los diferentes departamentos acad茅micos y administrativos del [Instituto de Radioastronom铆a y Astrof铆sica de la UNAM](http://www.irya.unam.mx/web). Y los concentra de manera centralizada para un acceso eficiente.

# Antecedentes

El Instituto de Radioastronom铆a y Astrof铆sica de la UNAM como instituci贸n de investigaci贸n en astronom铆a cuenta hasta el momento del desarrollo de esta propuesta con una base de 25 investigadores, 7 postdocs y 53 estudiantes de maestr铆a y doctorado. Desde su etapa anterior como Centro, el IRyA ha crecido de manera r谩pida en la cantidad de personal esto como es l贸gico genera un incremento en la generaci贸n de informaci贸n y esto a su vez incrementa el requerimiento de herramientas para almacenar, administrar y tenerla disponible para su utilizaci贸n e intercambio entre las distintas 谩reas.

El IRyA no cuenta con un sistema de gesti贸n integral de informaci贸n, por lo que conforme las situaciones lo iban dictando se han ido creando mini sistemas ad hoc para gestionar alguna tarea o necesidad en cuesti贸n. Esto ha dado como resultado, tener un cantidad importante de sistemas peque帽os los cuales poco a poco se han ido volviendo complicado mantener y comunicar entre s铆, lo cual no permite tener la informaci贸n disponible de la manera que se requiere, ya que es necesario recopilar de uno o varios minisistemas dependiendo el caso. Por lo anterior, se propone una integraci贸n de la informaci贸n de todos estos minisistemas sat茅lite en un solo sistema para una disponibilidad y accesibilidad de la informaci贸n.

# Objetivos

El SIIAA se crea con base a los siguientes objetivos:

- Crear un entorno multiplataforma y accesible para diferentes niveles de usuario.
- Centralizar la informaci贸n que se produce en el IRyA.
- Mejorar la accesibilidad a la informaci贸n de la Instituci贸n.
- Tener una aplicaci贸n escalable y modificable para ajustarse a las necesidades presentes y futuras.

# Herramientas de desarrollo

Para el desarrollo de la aplicaci贸n La aplicaci贸n ser谩 desarrollada para un ambiente web multiplataforma, el desarrollo se llevar谩 a cabo sobre un entorno Linux y con el uso de herramientas de software libre, los cuales podemos clasificar de la siguiente manera:

### Laravel/Livewire Framework

Para agilizar y estandarizar el desarrollo se opt贸 por el uso del聽 *[framework Laravel](https://laravel.com/docs/9.x) v.9.*聽 Un *framework* en programaci贸n se refiere a un conjunto de herramientas tecnol贸gicas que ofrecen un entorno gen茅rico para el desarrollo de proyectos.

En conjunto con *Laravel,* se integra el聽 *[framework* de *livewire 2](https://laravel-livewire.com/docs/2.x/quickstart),* con 茅l se tiene un conjunto de herramientas para el desarrollo de interfaces de interacci贸n din谩mica. *Livewire* permite generar de manera eficiente y estandarizada entornos de comunicaci贸n entre el cliente/servidor.

Adem谩s de la agilidad, el uso de un *framework* como *Livewire* permite crear aplicaciones web multiplataforma y *responsive* (que en ingl茅s se refiere a interfaces adaptables a diferentes dispositivos m贸viles),聽 tambi茅n se previene la incompatibilidad con navegadores o entre dispositivos.

### Manejador de base de datos MySQL

[MySQL](https://dev.mysql.com/doc/) es un sistema para la administraci贸n de bases de datos relacional. Es una base de datos de c贸digo abierto, bajo una licencia dual (Licencia p煤blica general/Licencia comercial por Oracle Corporation). 

# Requisitos de instalaci贸n

# Usuarios y permisos

Debido a que el sistema integra informaci贸n de diferentes departamentos, es necesario contar con tipos de usuario y permisos para asegurar que el acceso a esta este limitado por el tipo de informaci贸n y por el tipo de usuario que puede acceder a esta. 

Con lo anterior podemos clasificar la informaci贸n en tres tipos:

- **Informaci贸n p煤blica:** Cualquier usuario puede acceder a ella
- I**nformaci贸n de acceso restringido:** Solo los departamentos y personas involucradas podr谩n tener acceso a esta.
- **Informaci贸n privada:** Se trata de informaci贸n que solo las entidades y personas involucradas pueden acceder, por lo general se trata de datos personales o de car谩cter privado.

Los tipos de usuario se definen con base a las caracter铆sticas de acceso a los tipos de informaci贸n, para lo cual de manera general tenemos los siguientes tipos de usuario:

- **Usuario sin registro:** Es aquel que no requiere una cuenta de acceso, por lo que podr谩 tener acceso a cualquier tipo de informaci贸n publica que este disponible en el sitio web del IRyA o dependencia.
- **Usuario registrado nivel 1:** Este usuario podr谩 acceder a informaci贸n de acceso restringido dentro de las actividades y departamentos en los que este involucrado por sus actividades, as铆 como a la informaci贸n de la que sea propietario. Este usuario no tiene permisos de modificar/eliminar informaci贸n, salvo aquella de la que sea propietario. Por default, todos los usuarios registrados pertenecen a este tipo de usuarios.
- **Usuario registrado nivel 2:** Este usuario es considerado un tipo administrador, sin embargo solo tendr谩 acceso a la informaci贸n que involucre al departamento o 谩rea de la que sea parte o encargado. Como *usuario nivel 2*, podr谩 modificar/eliminar la informaci贸n a la que se le conceda acceso. Este tipo de usuarios estar谩n asignados para personas responsables de departamento o de administrar alguna informaci贸n especifica.
- **Usuario Administrador**: El usuario administrador tendr谩 acceso a toda la informaci贸n del sistema, as铆 como a la configuraci贸n del mismo. Por el amplio rango de posibilidades de este tipo de usuarios, se restringir谩 el n煤mero de cuentas otorgables a un m谩ximo de dos personas. Este tipo de usuario ser谩 el responsable de la creaci贸n de nuevas cuentas de usuario, cambios en la informaci贸n previa solicitud y autorizaci贸n de las entidades competente.

Es importante mencionar que toda actividad realizada por cualquier tipo de usuario es registrada y supervisada de manera peri贸dica. Dada la diversidad de informaci贸n que se integrar谩, en cada modulo se tendr谩 una explicaci贸n detallada de los roles y permisos que se tendr谩n para cada caso.

# M贸dulos

## Comisiones