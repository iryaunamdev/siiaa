# Documentación SIIAA

Created: June 13, 2022 1:38 PM
Last Edited Time: June 13, 2022 3:14 PM
Stakeholders: Anonymous
Status: In Progress 🙌
Type: Documentation

# Introducción

El Sistema Integral de Información Académica y Administrativa (SIIAA), es un sistema que reúne la información producida por los diferentes departamentos académicos y administrativos del [Instituto de Radioastronomía y Astrofísica de la UNAM](http://www.irya.unam.mx/web). Y los concentra de manera centralizada para un acceso eficiente.

# Antecedentes

El Instituto de Radioastronomía y Astrofísica de la UNAM como institución de investigación en astronomía cuenta hasta el momento del desarrollo de esta propuesta con una base de 25 investigadores, 7 postdocs y 53 estudiantes de maestría y doctorado. Desde su etapa anterior como Centro, el IRyA ha crecido de manera rápida en la cantidad de personal esto como es lógico genera un incremento en la generación de información y esto a su vez incrementa el requerimiento de herramientas para almacenar, administrar y tenerla disponible para su utilización e intercambio entre las distintas áreas.

El IRyA no cuenta con un sistema de gestión integral de información, por lo que conforme las situaciones lo iban dictando se han ido creando mini sistemas ad hoc para gestionar alguna tarea o necesidad en cuestión. Esto ha dado como resultado, tener un cantidad importante de sistemas pequeños los cuales poco a poco se han ido volviendo complicado mantener y comunicar entre sí, lo cual no permite tener la información disponible de la manera que se requiere, ya que es necesario recopilar de uno o varios minisistemas dependiendo el caso. Por lo anterior, se propone una integración de la información de todos estos minisistemas satélite en un solo sistema para una disponibilidad y accesibilidad de la información.

# Objetivos

El SIIAA se crea con base a los siguientes objetivos:

- Crear un entorno multiplataforma y accesible para diferentes niveles de usuario.
- Centralizar la información que se produce en el IRyA.
- Mejorar la accesibilidad a la información de la Institución.
- Tener una aplicación escalable y modificable para ajustarse a las necesidades presentes y futuras.

# Herramientas de desarrollo

Para el desarrollo de la aplicación La aplicación será desarrollada para un ambiente web multiplataforma, el desarrollo se llevará a cabo sobre un entorno Linux y con el uso de herramientas de software libre, los cuales podemos clasificar de la siguiente manera:

### Laravel/Livewire Framework

Para agilizar y estandarizar el desarrollo se optó por el uso del  *[framework Laravel](https://laravel.com/docs/9.x) v.9.*  Un *framework* en programación se refiere a un conjunto de herramientas tecnológicas que ofrecen un entorno genérico para el desarrollo de proyectos.

En conjunto con *Laravel,* se integra el  *[framework* de *livewire 2](https://laravel-livewire.com/docs/2.x/quickstart),* con él se tiene un conjunto de herramientas para el desarrollo de interfaces de interacción dinámica. *Livewire* permite generar de manera eficiente y estandarizada entornos de comunicación entre el cliente/servidor.

Además de la agilidad, el uso de un *framework* como *Livewire* permite crear aplicaciones web multiplataforma y *responsive* (que en inglés se refiere a interfaces adaptables a diferentes dispositivos móviles),  también se previene la incompatibilidad con navegadores o entre dispositivos.

### Manejador de base de datos MySQL

[MySQL](https://dev.mysql.com/doc/) es un sistema para la administración de bases de datos relacional. Es una base de datos de código abierto, bajo una licencia dual (Licencia pública general/Licencia comercial por Oracle Corporation). 

# Requisitos de instalación

# Usuarios y permisos

Debido a que el sistema integra información de diferentes departamentos, es necesario contar con tipos de usuario y permisos para asegurar que el acceso a esta este limitado por el tipo de información y por el tipo de usuario que puede acceder a esta. 

Con lo anterior podemos clasificar la información en tres tipos:

- **Información pública:** Cualquier usuario puede acceder a ella
- I**nformación de acceso restringido:** Solo los departamentos y personas involucradas podrán tener acceso a esta.
- **Información privada:** Se trata de información que solo las entidades y personas involucradas pueden acceder, por lo general se trata de datos personales o de carácter privado.

Los tipos de usuario se definen con base a las características de acceso a los tipos de información, para lo cual de manera general tenemos los siguientes tipos de usuario:

- **Usuario sin registro:** Es aquel que no requiere una cuenta de acceso, por lo que podrá tener acceso a cualquier tipo de información publica que este disponible en el sitio web del IRyA o dependencia.
- **Usuario registrado nivel 1:** Este usuario podrá acceder a información de acceso restringido dentro de las actividades y departamentos en los que este involucrado por sus actividades, así como a la información de la que sea propietario. Este usuario no tiene permisos de modificar/eliminar información, salvo aquella de la que sea propietario. Por default, todos los usuarios registrados pertenecen a este tipo de usuarios.
- **Usuario registrado nivel 2:** Este usuario es considerado un tipo administrador, sin embargo solo tendrá acceso a la información que involucre al departamento o área de la que sea parte o encargado. Como *usuario nivel 2*, podrá modificar/eliminar la información a la que se le conceda acceso. Este tipo de usuarios estarán asignados para personas responsables de departamento o de administrar alguna información especifica.
- **Usuario Administrador**: El usuario administrador tendrá acceso a toda la información del sistema, así como a la configuración del mismo. Por el amplio rango de posibilidades de este tipo de usuarios, se restringirá el número de cuentas otorgables a un máximo de dos personas. Este tipo de usuario será el responsable de la creación de nuevas cuentas de usuario, cambios en la información previa solicitud y autorización de las entidades competente.

Es importante mencionar que toda actividad realizada por cualquier tipo de usuario es registrada y supervisada de manera periódica. Dada la diversidad de información que se integrará, en cada modulo se tendrá una explicación detallada de los roles y permisos que se tendrán para cada caso.

# Módulos

## Comisiones