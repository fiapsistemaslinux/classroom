!SLIDE incremental transition=fade

# Chaos Engineering

Dentro do conceitos de iac temos modelos mais complexos e maiores que servem como uma refêrencia de até onde um ambiente dotado da cultura correta e ferramentas corretas pode chegar.

Neste aponto alguns conceitos interessantes podem ser citados, o principal deles é o **Chaos Enginnering**;

> **Chaos Engineering is the discipline of experimenting on a distributed system**
> **in order to build confidence in the system’s capability**
> **to withstand turbulent conditions in production.**

[http://principlesofchaos.org/](http://principlesofchaos.org/)

!SLIDE incremental transition=fade

# Chaos Engineering

O modelo de arquitetura utilizado pela Netflix segungo artigos de seu [blog no medium](https://medium.com/netflix-techblog) se baseia na estratégia definida como Chaos Engineering somado a um investimento forte em infra estrutura de cloud computing (AWS para ser mais exato) e no uso de microserviços, um assunto futuro do curso;

![Netflix_logo.svg.png](images/Netflix_logo.svg.png)

!SLIDE incremental transition=fade

# Chaos Engineering

![Netflix_logo2.svg.png](images/Netflix_logo2.svg.png) A abordagem da Netflix para Chaos Engineering é a auto avaliação e executada em produção,  o que inclui gerar falhas na sua própria infra estrutura como meio de teste para resiliência do ambiente;

- O conjunto de soluções da Netflix criadas com essa finalidade é chamado de **The Netflix Simian Army** como descrito [neste artigo](https://medium.com/netflix-techblog/the-netflix-simian-army-16e57fbab116) do blog já citado.

- Tratase de um conjunto de soluções capazes de causar tipos diferentes de stress e simulação de falhas em ambientes de produção. 

- A mais famosa dessas soluções é provavelmente o Chaos Monkey um serviço que identifica grupos especificos de sistemas e finaliza aleatoriamente aplicações/sistemas dentro destes grupos. (Literalmente um código escrito para sabotar propocitalmente sua infra estrutura);

- [https://github.com/Netflix/SimianArmy/wiki/Chaos-Monkey](https://github.com/Netflix/SimianArmy/wiki/Chaos-Monkey)

!SLIDE transition=fade

# Chaos Engineering

<iframe width="560" height="315" src="https://www.youtube.com/embed/rgfww8tLM0A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

Link do Vídeo: [https://www.youtube.com/embed/rgfww8tLM0A](https://www.youtube.com/embed/rgfww8tLM0A)


!SLIDE incremental transition=fade

# Chaos Engineering

**Not IF this fails, but WHEN it fails**

* Falhas podem e irão ocorrer mas **não** devem ser vistas ou sentidas pelo usuário;
* "Unit tests" são importantes mas referem-se a algo que você espera testar e pensa em testar;
* "Integration tests" permitem a validação da comunicação entre componentes e serviços mas se enquadram na mesma questão acima;
* "Chaos Engineering" possui outro foco: Garantir a resiliência mesmo em condições de falha e em ambientes de produção;
* Esse tipo de teste deve **trabalhar em conjunto** com testes tradicionais;
* Testes de falha em cascata ou seja quado um sistema "vai derrubando" outros sistema sequencialmente também fazem parte da arquitetura da Netflix;