!SLIDE incremental transition=fade

# Gerênciamento de Dependências

**Descrição:**

A twelve-factor app never relies on implicit existence of system-wide packages. **It declares all dependencies, completely and exactly, via a dependency declaration manifest.** 

O conceito defendido no modelo Twelve Factory refere-se ao seguinte:

- O isolamento de depêndencias é um pré-requisito para garantir a capacidade de reproduzir cenários/ambientes;

- Este isolamento é feito a partir da declaração explicita de todas as depêndencias e geralmente é facilitado pelo uso de soluções de gerenciamento de depêndencias;


!SLIDE incremental transition=fade

# Gerênciamento de Dependências

A maioria das linguagens de programação oferece um sistema de empacotamento para distribuir bibliotecas e dependências de apoio, como por exemplo o Rubygems da linguagem Ruby ou o NPM do node.

- Essa caracterśitica é essencial para o gerenciamento e automação de aplicações;

- Outro benefício da declaração de dependências é que ela simplifica a configuração para desenvolvedores novos no projeto;


!SLIDE incremental transition=fade

# Gerênciamento de Dependências

**Como as linguagens de programação fazem o controle de depêndências?**

Alguns exemplos:

- [PHP (Composer)](https://getcomposer.org/)
- [Node (NPM)](https://www.npmjs.com/get-npm)
- [Python (pip)](https://pip.pypa.io/en/stable/user_guide/)
- [Go (dep - extra oficial)](https://github.com/golang/dep)


!SLIDE transition=fade

# Gerênciamento de Dependências + Empacotamento

Além das soluções e tecnologias que permitem gerenciar e instalar facilmente novas dependências existem soluções adotadas capazes de executar este processo junto com o processo de empacotamento;

No caso de Java por exemplo:

- [Grandle](https://docs.gradle.org/current/userguide/userguide.html)
- [Maven](https://maven.apache.org/index.html)

.callout.info `Este tipo de solução agrega o gerenciamento de dependências a processos de empactomamento de aplicações usando linguagens declarativas como XML ou Groove;`


!SLIDE transition=fade

# Gerênciamento de Dependências + Isolamento

Outra abordagem comum em algumas linguagens e tecnologias é prover um recurso que permita o isolamento de dependências facilitando o processo de reprodução de cenários;

Um bom exemplo deste método é o uso de Virtualenvs da linguagem Python:

[PYTHON E VIRTUALENV: COMO PROGRAMAR EM AMBIENTES VIRTUAIS](https://pythonacademy.com.br/blog/python-e-virtualenv-como-programar-em-ambientes-virtuais)

.callout.info `Essa prática se enquadra tanto no gerenciamento de dependências quanto em configuração ("item 3 do 14 Factory")`


!SLIDE incremental transition=fade

# Exercícios

1. Como controlar dependências entre ambientes de desenvolvimento e produção, considere o node como a linguagem de programação em questão;

2. Qual a relação entre os processos de gestão de dependências e o repositório (base de código)?

3. Dependências como módulos instalados em node ou ambientes virtuais (como no exemplo referente a python) devem ser controlados por base de código (GIT)? Justifique;

4. Como garantir que a versão de uma aplicação ou compilador (como node ou PHP) em uso seja sempre a mesma de forma que qualquer programador envolvido consiga reproduzir o mesmo ambiente?

5. O uso e armazenamento de binários e versões pré-compiladas (como, por exemplo, os artefactos ".war" muito usados em Java) é uma boa prática? Justifique.

!SLIDE incremental transition=fade

# Exercícios (Parte 1)

**Questões sobre Gerenciamento de Dependências**
[https://pt.surveymonkey.com/r/TY26VX7](https://pt.surveymonkey.com/r/TY26VX7)

![quiz-dep.png](images/QR_code_TY26VX7.png)


!SLIDE incremental transition=fade

# Exercícios (Parte 2)

**Questões sobre base de código**
[https://pt.surveymonkey.com/r/2C5NVQW](https://pt.surveymonkey.com/r/2C5NVQW)

![quiz-git.png](images/QR_code_2C5NVQW.png)
