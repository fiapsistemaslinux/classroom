![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/rsz_xss-logo.jpg)

# Cross Site Scripting 

O Cross-Site Scripting (XSS) é uma vulnerabilidade causada pela ausência de validação dos parâmetros de entrada fornecidos pelo usuário para uma aplicação;

Vulnerabilidades baseadas em XSS ou Cross-site scripting são muito comuns em aplicações frontend que utilizam qualquer modelo de interação com os usuário como por exemplo em blogs, fórums e redes sociais, o conceito por trás deste tipo de vulnerabilidade é explorar campos com entradas fornecidas por usuários ( posts de textos e mensagens em geral ) que são refletidas instantaneamente pela página, ( dai a incidencia tão grande em blogs e fóruns ).

Na versão de 2013 da owasp o XSS aparece como [terceiro item no top 10](https://www.owasp.org/index.php/Top_10_2013-A3-Cross-Site_Scripting_(XSS)) sendo uma vulnerabilidade com dificuldade média de exploração, impacto moderado e de díficil detecção.

Poder de ataque do XSS:

- Roubo dos cookies de sessão;
- Reescrever conteúdo da página;
- Redirecionar a action de formulários;
- Inserir scripts maliciosos;
- Total controle sobre um domínio;

> Apesar de individualmente não apresentar poder destrutivo no servidor o XSS pdoe ser muito perigoso uma vez que é um catalisador para outros ataques mais sofisticados, como o CSRF;

Ataques baseados em XSS podem surgir a partir de diversos vetores, sendo geralmente dividido em três categorias: 

- reflected
- stored
- DOM-based

> Algumas bibliografias como o Livro [mastering-modern-web-penetration-testing](https://www.packtpub.com/networking-and-servers/mastering-modern-web-penetration-testing) de Prakhar Prasad oferecem uma subdivisão maior com cinco classificações, o que inclui Flash-based XSS e HttpOnly cookies.

## Como ocorre um ataque baseado em XSS?

Para apresentar o conceito utilizaremos um exemplo baseado na aplicação [DVWA](http://www.dvwa.co.uk/), você pode utilizar sua implementação nativa ou a versão contida no [OWASP Broken Web Applications Project](https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project), acesse o endereço da aplicação e em seguida o link "Damn Vulnerable Web Application", Autenticar utilizando as credenciais **Username: admin** e **Password: admin**, No menu a esquerda escolher a opção "XSS reflected".

A pagina exibida possuirá o layout abaixo:

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/dvwa-xss-reflected-01.png)

Nesta página temos um campo para entrada de dados, no formato usado em blogs, fórums e páginas que permitam publicação de texto:

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/dvwa-xss-reflected-02.png)


A informação inserida nessa página deveria supostamente ser sanetizada antes de ser aceita, quando isso não ocorre abre-se uma brecha para que um atacante tente executar código ao invés de texto, como exemplo insira o texto abaixo no campo "What`s your name?":

```sh
<script>
alert("A casa caiu...");
</script>
```
 
Em seguida grave esta informação usando a opção "Submit", você deverá obter um retorno conforme abaixo:

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/dvwa-xss-reflected-03.png)

Embora simples esse case exemplifica a maneira como ocorrem falhas de XSS;

## XSS do tipo Reflected:

Vulnerabildiades de XSS do tipo Reflected são provavelmente as mais comuns e mais exploradas dentro dos tipos de vulnerabilidades de XSS, nesse processo a aplicação recebe um ou mais parâmetros de entrada que são refletidos na página web gerada pela aplicação, o principio basico dessa vulnerabilidade é explorar a execução de código que acontece no browser do usuário no momento em que a página é acessada o que possibilitará as seguintes ações:

- Executar código Javascript malicioso;
- Utilizar e executar exploits no navegador do cliente que fez a Requisição;
- Bypass em proteções contra CSRF ( Da para utilizar o XSS como meio para explorar vulnerabilidades CSRF );
- Executar desvios temporários em conexões e conteúdos;

### XSS Reflected, ação ofensiva contra o usuário:

O uso ofensivo de XSS baseia-se no seguinte: 

1- Ataques de reflexão são enviados para as vítimas por meio de engenharia social, utilizando email, Skype, Facebook ou algum outro meio;

2- A vítima é levada a clicar em um link malicioso com parâmetros forjados (GET) ou uma página criada pelo atacante contendo um form (POST);

3- O código injetado viaja para o site vulnerável e é devolvido (refletido) para o navegador do usuário, que confia na resposta da aplicação e executa o código malicioso;

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/xss-reflected.png)

***O exemplo utilizado inicialmente trata de um modelo de XSS Refletido.***

---

## Persistent (stored) XSS

De acordo com a OWASP, os ataques XSS Persistent são aqueles onde os scripts são armazenados permanentemente no back-end. A vítima então recebe esse script ao realizar o acesso a página.

Um dos processos baseados em XSS Stored é a execução de pinishing em páginas de Web, Para que isso seja feito é necessário o armazenamento dos dados enviados em um backend, o exemplo anterior envolvendo com a págian mutillidae utilizou essa metodologia para através de um campo de postagem pudessemos executar um POST de conteúdo e armazena-lo no servidor, o conteúdo armazenado era Javascript enquanto armazenado será executado cada vez que o usuário acessar o conteúdo executando um GET.

> O XSS Stored geralmente é mais perigoso que o XSS refletido pois o XSS persistente é entregue pela aplicação e executado no navegador do usuário sempre que o recurso vulnerável for acessado, basta um único acesso ao site ou à URL maliciosa para código do atacante ser inserido na página vulnerável.

### XSS Stored usando HTML:

Entrando nos processos de XSS Stored, a primeira questão é identificar quais os tipos de campos aceitos ou seja, até onde foi ou não foi a sanetização de dados de entrada, um modelo muito comum é testar a chamada de páginas HTML dentro de sua instrução;

O modelo abaixo utilizará novamente a aplicação [DVWA](http://www.dvwa.co.uk/), do [OWASP Broken Web Applications Project](https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project), "Damn Vulnerable Web Application", Autenticar utilizando as credenciais **Username: admin** e **Password: admin**, No menu a esquerda escolher a opção "XSS stored".

Faça um teste inserindo o conteúdo abaixo:

```sh
<script>
document.body.innerHTML="";
</script>
```

Salve o conteudo utilizando a opção "Sign Guestbook" e faça um teste acessando a página a partir de uma Guia Anônima, o conteúdo exibido devera ser similar ao layout de uma página completamente em branco:

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/dvwa-xss-stored-01.png)

Para executar um segundo teste faça um Reset na base de dados apagando nossas entradas anteriores, para isso volte para o menu do DVWA e escolha a opção ***"Setup"*** e em seuida ***"Create / Reset Database"*** conforme a imagem abaixo:

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/Sec/images/dvwa-xss-stored-02.png)


Outra proposta possível utilizando a mesma metodologia seria usar código HTML para exposição de uma imagem no lugar do conteúdo da página:

```sh
<script>
  document.body.innerHTML="";
  var imagem=new Image();
  imagem.src="[url da imagem]";
  document.body.appendChild(imagem);
</script>
```

---

# Material de Referência:

Boa parte dessa aula baseia-se em uma publicação de Prakhar Prasad pela editora Packt:

* [Livro, Mastering Modern Web Penetration Testing](https://www.packtpub.com/networking-and-servers/mastering-modern-web-penetration-testing)


O curso da [Alura]() sobre Segurança Web apresenta alguns conceitos muito legais sobre sequestro de sessão e XSS usando como base a plataforma OWASP:

* [Curso Segurança Web: Vulnerabilidades do seu sistema e OWASP
](https://cursos.alura.com.br/course/seguranca-web-vulnerabilidades-do-seu-sistema)

---

**Free Software, Hell Yeah!**
