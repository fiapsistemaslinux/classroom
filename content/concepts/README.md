## Introdução

*"The most important problem that we face as software professionals is this: If somebody thinks of a good idea, how do we deliver it to users as quickly as possible?"*

O trecho acima refere-se ao primeiro paragráfo do primeiro capítulo do Livro "Continuos Delivery" dos Authores Jez Humble e David Farley, o livro é uma das melhores referências escritas até então sobre Delivery Continuos e todas as práticas que compõem essa prática, o que desenvolvedores, engenheiros e afins passaram a chamar de devops ou "cultura devops" se preferir, é exatamente sobre essa cultura e sobre essas práticas que trataremos neste material, a idéia é abordar o tema de forma prática com exemplos e contextos baseados em conteúdos já desenvolvidos sobre o assunto e utilizando ferramentas e plataformas que tornem isso possível.

**Importante:**

Boa parte dos textos são baseados e utilizam elementos da bibliografia de Jez Humble, fica a indicação desse conteúdo que meio que funciona como uma biblia sobre o asssunto.

### Terminologia e conceitos básicos

Para começarmos a aprofundar um pouco as coisas alguns conceitos precisam ser estabelecidos, alguns deles possuem capítulos próprios e serão destrinchados a frente porém ainda assim neste primeiro momento vale uma aprensentação para facilitar :

* [Deployment Pipeline](https://github.com/2TINsecdevops/classroom/blob/master/content/concepts/pipeline.md)
* [Continuos Integration]()
* [Continuos Delivery]()

### Por que entregar código em produção é tão complicado (Será que é mesmo?)

Agora que já esclarecemos os três conceitos acima podemos começar a discutir o problema, ao falar em devops  muito comum que tentemos identificar e resolver alguns problemas que são a causa raiz de toda essa movimentação sobre cultura devops, neste momento chamaremos estes problemas de "Anti Patterns" e listaremos alguns deles abaixo, são situaçes e modelos tão comuns na área de técnologia que podem ser encontrados no time de desenvolvimento mais próximo de você.

***1. Entrega Manual de Software***

Qualquer aplicação de médio porte desenvolvida hoje em dia est repleta de componentes e depêndencias além da criticidade relaionada ao ambiente, o que torna a coisa toda bem difícil de se manipular, entregar releases de aplicaçes que reunam essas caracteristicas manualmente em muitos casos não a melhor das alternaticas mas ainda assim  o que muitas empresas fazem, considerando essas entregas manuais fica bem fácil identificar alguns possíveis problemas: 

* A entrega manual de software est sujeita a jugamentos e tomada de decisõesque podem variar entre as entregas;
* Essas decises estão natualmente sujeitas a erros humanos;
* Mesmo que decisões corretas sejam tomadas alterações na ordem em que as coisas são feitas geram diferenças no resultado final (E isso quase nunca  algom bom);


Tendo como base esses sintomas vamos aos resultados esperados:


* Testes manuais geralmente são necessários, afinal se o processo não foi automatizados como garantir que terá sempre o mesmo resultado se não validando o que foi feito?

* É comum que o processo seja segregado entre times, e  nesses casos pe comum que o time de desenvolviemnto tenha contato limitado ou até mesmo negado ao ambiente de produção;

* Também tendem a ocorrer correções manuais nos processos de release de código e correções podem ser necessária, as vezes isso ocorre no meio do delivery

* Os ambientes ou "Environments" que suportam a aplicação tendem a divergir entre si, (diferentes versões de bibliotecas, arquivos de configuração etc).
