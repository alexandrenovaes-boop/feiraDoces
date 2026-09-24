<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cantinho do Doce</title>

  <!-- FONTES -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=League+Spartan:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS -->

  <link rel="stylesheet" href="<?=URL?>/assets/css/style-doce.css">
</head>

<body>
<?php require_once './config/config.php';?>
<div class="layout">

  <!--MENU LATERAL -->

  <aside class="menu-lateral">

    <div class="logo">

      <span>

        <img
          src="<?=URL?>/assets/img/logo_base2-removebg-preview.png"
          alt=""
          style="width: 90px;">

      </span>
      Cantinho dos Doces
    </div>

    <nav class="navegacao">

      <!-- INÍCIO -->

      <button
        id="botaoInicio"
        class="ativo"
        onclick="irPara('inicio')">
        <span class="simbolo">
          <img
            src="<?=URL?>/assets/img/Copy_of_Blue_Minimalist_Doctor_Appointment_Booking_App_Mobile_Prototype-removebg-preview.png"
            width="20px">
        </span>

        <span class="texto">
          Início
        </span>
      </button>

      <!-- CARRINHO -->

      <button
        id="botaoCarrinho"
        onclick="irPara('carrinho')">
        <span class="simbolo">🛒</span>
        <span class="texto">Carrinho<b id="quantidade">(1)</b>
        </span>
      </button>
    </nav>

    <!-- TOTAL DO CARRINHO -->

    <div class="menu-lateral-baixo">
      <b id="totalLateral">R$ 4,30</b>
      <small>total de carrinho</small>
    </div>
  </aside>

  <!-- CONTEÚDO -->

  <main class="conteudo">

    <!-- BOTÃO DE IDIOMA -->

    <button
      id="botaoIdioma"
      onclick="alternarIdioma()">

      <img
        src="<?=URL?>/assets/img/language-solid-full.svg"
        width="50px"
        alt="Idioma">

      <span>
        English
      </span>
    </button>

    <!--PÁGINA INICIAL-->

    <section
      id="inicio"
      class="pagina ativa">

      <!-- BANNER -->
      <div class="banner">
        <h2>
         Deixe seu<br>
         dia mais doce!!
        </h2>

        <p>Doces feitos para deixar qualquer momento especial!</p>
        
        <img
          src="<?=URL?>/assets/img/Copy_of_Blue_Minimalist_Doctor_Appointment_Booking_App_Mobile_Prototype__1_-removebg-preview.png"
          alt="Donuts">
      </div>

      <!-- DESTAQUES -->

      <div class="secao">
        <h2>Destaques</h2>
        <span class="etiqueta">
          Mais pedidos
        </span>
      </div>



      <!-- PRODUTOS -->
      <div class="produtos">


    <?php if (isset($_GET['mensagem'])): ?>
    <p><strong>
        <?= htmlspecialchars($_GET['mensagem']) ?>
      </strong></p>
    <?php endif; ?>

    <?php while ($linha = $doce->fetch_assoc()): ?>

    <article class="produto">

      <div class="imagem-produto">

        <img src="<?=URL?>/assets/img/<?= htmlspecialchars($linha['id']) ?>.png" alt="<?= htmlspecialchars($linha['nome']) ?>">
      </div>
      <h3>
        <?= htmlspecialchars($linha['nome']) ?>
      </h3>

      <div class="linha-produto">
        <span class="preco">
          <?= htmlspecialchars($linha['preco']) ?>
        </span>
        <button class="adicionar" onclick="adicionar(<?= htmlspecialchars($linha['id']) ?>)">+</button>
      </div>
    </article>

    <?php endwhile; ?>


    <!--CARRINHO-->


    <section
      id="carrinho"
      class="pagina">

      <button class="voltar" onclick="irPara('inicio')">
        ← Voltar para os produtos
      </button>

      <div class="secao">
        <h2>Carrinho</h2>

        <label>
          <input
            id="selecionarTudo"
            type="checkbox"
            checked
            onchange="selecionarTodos(this)">
          <span id="textoTudo">Tudo</span>
        </label>
      </div>

      <div class="grade-carrinho">
        <!-- ITENS -->

        <div
          id="itens"
          class="itens-carrinho">
        </div>
        <!-- RESUMO -->

        <aside class="resumo">
          <h2>
            Resumo da compra
          </h2>
          <div class="linha-resumo">
            <span>
              Subtotal
            </span>
            <span id="subtotal">
              R$ 4,30
            </span>
          </div>

          <div class="linha-total">
            <span>
              Total
            </span>
            <span id="total">
              R$ 4,30
            </span>
          </div>

          <!-- BOTÃO PAGAR -->

          <button
            class="pagar"
            onclick="pagar()">
            Pagar
          </button>
        </aside>
      </div>
    </section>
  </main>
</div>

<!--MODAL DO QR CODE-->
 <div id="modalPagamento"
   class="modal-pagamento"> 
   <div class="caixa-pagamento">

    <!-- BOTÃO X -->
    <button
      class="fechar-pagamento"
      onclick="fecharPagamento()">×</button>

    <!-- TÍTULO -->
    <h2 id="tituloPagamento">Pagamento</h2>

    <!-- TEXTO -->
    <p id="textoPagamento"> Escaneie o QR Code para realizar o pagamento.</p>

    <!-- QR CODE -->
    <img id="qrcodePagamento" src="<?=URL?>/assets/img/qrcodepix.jpeg"alt="QR Code para pagamento">

    <!-- FECHAR -->
    <button class="botao-fechar-pagamento" onclick="fecharPagamento()">Fechar</button>
  </div>
</div>

<!-- JAVASCRIPT-->

  <script>
    /*PRODUTOS*/
    const produtos = {


      finiursinho: {
        nome: 'Fini 15g ursinho',
        preco: 1.25,
        imagem: '<?=URL?>/assets/img/fini-15g-ursinho.png'
      },

      fini_beijinho_15g: {
        nome: 'Fini beijinhos 15g',
        preco: 1.25,
        imagem: '<?=URL?>/assets/img/finibeijinho.png'
      },

      finitubes: {
        nome: 'Tubes morango 15g',
        preco: 2.00,
        imagem: '<?=URL?>/assets/img/finetubinhosemserazedo.png'
      },

      fini_banana_15g: {
        nome: 'Fini banana 15g',
        preco: 1.25,
        imagem: '<?=URL?>/assets/img/finibanana.png'
      },

      fini_dentadura_15g: {
        nome: 'Fini dentadura 15g',
        preco: 1.25,
        imagem: '<?=URL?>/assets/img/finidentadura.png'
      },

      pacoca: {
        nome: 'Paçoca',
        preco: 1.50,
        imagem: '<?=URL?>/assets/img/paçoca.png'
      }
    };

    /* CARRINHO*/
    let carrinho = {

      finiursinho: 1,

      fini_beijinho_15g: 0,

      finitubes: 0,

      fini_banana_15g: 0,

      fini_dentadura_15g: 0,

      pacoca: 0

    };




    let selecionados = {

      finiursinho: true,

      fini_beijinho_15g: false,

      finitubes: false,

      fini_banana_15g: false,

      fini_dentadura_15g: false,

      pacoca: false

    };




    /*IDIOMA*/

    let idiomaAtual = 'pt';
    const traducoes = {
      pt: {

        inicio: 'Início',

        carrinho: 'Carrinho',

        totalCarrinho:
          'total de carrinho',

        bannerTitulo:
          'Deixe seu <br> dia mais doce!!',

        bannerTexto:
          'Doces feitos para deixar qualquer momento especial!',

        destaques:
          'Destaques',

        maisPedidos:
          'Mais pedidos',

        voltar:
          '← Voltar para os produtos',

        tudo:
          'Tudo',

        resumo:
          'Resumo da compra',

        subtotal:
          'Subtotal',

        total:
          'Total',

        pagar:
          'Pagar',

        carrinhoVazio:
          'Seu carrinho está vazio.',

        botaoIdioma:
          'English',

        tituloPagamento:
          'Pagamento',

        textoPagamento:
          'Escaneie o QR Code para realizar o pagamento.',

        fechar:
          'Fechar'
      },

      en: {

        inicio:
          'Home',

        carrinho:
          'Cart',

        totalCarrinho:
          'cart total',

        bannerTitulo:
          'Let your<br>day sweeter!!',

        bannerTexto:
          'Sweets made to let any moment special!',

        destaques:
          'Highlights',

        maisPedidos:
          'Best sellers',

        voltar:
          '← Back to products',

        tudo:
          'All',

        resumo:
          'Order summary',

        subtotal:
          'Subtotal',

        total:
          'Total',

        pagar:
          'Pay',

        carrinhoVazio:
          'Your cart is empty.',


        botaoIdioma:
          'Português',

        tituloPagamento:
          'Payment',

        textoPagamento:
          'Scan the QR Code to make the payment.',

        fechar:
          'Close'
      }
    };

    /*NOMES DOS PRODUTOS*/


    const nomesProdutos = {

      pt: {
        finiursinho:
          'Fini 15g ursinho',

        fini_beijinho_15g:
          'Fini beijinhos 15g',

        finitubes:
          'Tubes morango 15g',

        fini_dentadura_15g:
          'Fini dentadura 15g',

        fini_banana_15g:
          'Fini banana 15g',

        pacoca:
          'Paçoca'

      },

      en: {


        finiursinho:
          'Fini 15g gummy bear',

        fini_beijinho_15g:
          'Fini kisses 15g',

        finitubes:
          'Strawberry Tubes 15g',

        fini_dentadura_15g:
          'Fini gummy teeth 15g',

        fini_banana_15g:
          'Fini banana 15g',

        pacoca:
          'Peanut butter'
      }
    };

    /* FORMATAR PREÇO */

    function formatarPreco(valor) {
      return valor.toLocaleString(
        idiomaAtual === 'pt'
          ? 'pt-BR'
          : 'en-US',
        {
          style: 'currency',
          currency: 'BRL'
        }
      );
    }

    /*TROCAR PÁGINA*/

    function irPara(pagina) {

      document
        .querySelectorAll('.pagina')
        .forEach(secao => {
          secao.classList.remove('ativa');
        });

      document
        .getElementById(pagina)
        .classList.add('ativa');

      document
        .getElementById('botaoInicio')
        .classList.toggle(
          'ativo',
          pagina === 'inicio'
        );

      document
        .getElementById('botaoCarrinho')
        .classList.toggle(
          'ativo',
          pagina === 'carrinho'
        );

      if (pagina === 'carrinho') {
        mostrarCarrinho();
      }
    }

    /*ADICIONAR PRODUTO*/

    function adicionar(id) {

      if (!carrinho[id]) {
        carrinho[id] = 0;
      }

      carrinho[id]++;

      selecionados[id] = true;

      atualizar();

      irPara('carrinho');
    }

    /*ALTERAR QUANTIDADE */

    function alterarQuantidade(
      id, quantidade
    ) {

      carrinho[id] = Math.max(
        0,
        carrinho[id] + quantidade
      );
      if (carrinho[id] === 0) {
        selecionados[id] = false;
      }
      mostrarCarrinho();
      atualizar();
    }

    /*SELECIONAR TODOS*/

    function selecionarTodos(caixa) {
      Object
        .keys(carrinho)
        .forEach(id => {

          if (carrinho[id] > 0) {
            selecionados[id] =
              caixa.checked;
          }
        });
      mostrarCarrinho();
      atualizar();


    }




    /*SELECIONAR PRODUTO*/


    function selecionadorProduto(
      id,
      selecionado
    ) {

      selecionados[id] =
        selecionado;

      mostrarCarrinho();
      atualizar();
    }

    /* MOSTRAR CARRINHO*/

    function mostrarCarrinho() {
      const produtosAtivos =
        Object
          .keys(carrinho)
          .filter(
            id => carrinho[id] > 0
          );

      const itens =
        document.getElementById('itens');
      itens.innerHTML =

        produtosAtivos.length
          ? produtosAtivos
            .map(id => {
              const produto =
                produtos[id];

              const quantidadeProduto =
                carrinho[id];
              return `

              <article class="item-carrinho">

                <input
                  type="checkbox"
                  ${selecionados[id]
                  ? 'checked'
                  : ''}
                  onchange="
                    selecionadorProduto(
                      '${id}',
                      this.checked
                    )
                  ">
                <div class="imagem-carrinho">

                  <img src="${produto.imagem}" alt="${nomesProdutos[idiomaAtual][id]}">
                </div>

                <div class="informacoes-carrinho">
                  <h3>
                    ${nomesProdutos[
                idiomaAtual
                ][id]}
                  </h3>
          
                  <small>
                    ${formatarPreco(produto.preco)}
                  </small>
                  <div class="quantidade">

                    <button
                      onclick="
                        alterarQuantidade(
                          '${id}',-1)">


                      −


                    </button>




                    <span>


                      ${quantidadeProduto}


                    </span>




                    <button
                      onclick="
                        alterarQuantidade(
                          '${id}',
                          1
                        )
                      ">


                      +


                    </button>




                  </div>


                </div>




                <div class="total-item">


                  ${formatarPreco(


                  produto.preco *
                  quantidadeProduto


                )}


                </div>




              </article>


            `;


            })


            .join('')




          : `


        <div class="carrinho-vazio">


          ${traducoes[
            idiomaAtual
          ].carrinhoVazio}


        </div>


      `;




      /* CALCULAR TOTAL */


      const valorTotal =


        produtosAtivos.reduce(


          (total, id) => {




            if (selecionados[id]) {


              return total +


                produtos[id].preco *


                carrinho[id];


            }




            return total;


          },


          0


        );




      document
        .getElementById('subtotal')
        .textContent =
        formatarPreco(valorTotal);




      document
        .getElementById('total')
        .textContent =
        formatarPreco(valorTotal);




      atualizarBotaoTudo();


    }




    /* =========================
       CHECKBOX TUDO
    ========================= */


    function atualizarBotaoTudo() {




      const produtosAtivos =


        Object
          .keys(carrinho)
          .filter(
            id => carrinho[id] > 0
          );




      const todosSelecionados =


        produtosAtivos.length > 0 &&


        produtosAtivos.every(
          id => selecionados[id]
        );




      document
        .getElementById(
          'selecionarTudo'
        )
        .checked =
        todosSelecionados;


    }




    /* =========================
       ATUALIZAR CARRINHO
    ========================= */


    function atualizar() {




      const quantidadeTotal =


        Object
          .values(carrinho)
          .reduce(


            (total, quantidade) =>


              total + quantidade,


            0


          );




      const valorTotal =


        Object
          .keys(carrinho)
          .reduce(


            (total, id) => {




              if (selecionados[id]) {


                return total +


                  produtos[id].preco *


                  carrinho[id];


              }




              return total;


            },


            0


          );




      document
        .getElementById('quantidade')
        .textContent =
        '(' + quantidadeTotal + ')';




      document
        .getElementById('totalLateral')
        .textContent =
        formatarPreco(valorTotal);


    }




    /* =========================
       PAGAMENTO
    ========================= */


    function pagar() {




      const modal =


        document.getElementById(
          'modalPagamento'
        );




      modal.classList.add('aberto');


    }




    /* =========================
       FECHAR PAGAMENTO
    ========================= */


async function fecharPagamento() {

  document
    .getElementById('modalPagamento')
    .classList.remove('aberto');

  const idsComprados = Object.keys(carrinho)
    .filter(id => carrinho[id] > 0 && selecionados[id]);

  if (idsComprados.length === 0) {
    return;
  }

  const itens = idsComprados.map(id => ({
    nome: produtos[id].nome,
    quantidade: carrinho[id]
  }));

  try {
    const resposta = await fetch('index.php?action=baixarEstoque', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ itens })
    });

    const resultado = await resposta.json();

    if (!resposta.ok || !resultado.sucesso) {
      alert('Erro ao confirmar pagamento: ' + resultado.erro);
      return;
    }

    idsComprados.forEach(id => {
      delete carrinho[id];
      delete selecionados[id];
    });

    mostrarCarrinho();
    atualizar();

    alert('Pagamento confirmado! Obrigado pela compra 🍬');

  } catch (erro) {
    console.error('Erro ao atualizar estoque:', erro);
    alert('Não foi possível confirmar o pagamento. Tente novamente.');
  }
}

function fecharModalPagamento() {
  document.getElementById('modalPagamento').style.display = 'none';
}



    /* =========================
       TRADUÇÃO
    ========================= */


    function aplicarTraducao() {




      const t =
        traducoes[idiomaAtual];




      /* MENU */


      document
        .querySelector(
          '#botaoInicio .texto'
        )
        .textContent =
        t.inicio;




      document
        .querySelector(
          '#botaoCarrinho .texto'
        )
        .innerHTML =
        `${t.carrinho}
       <b id="quantidade"></b>`;




      document
        .querySelector(
          '.menu-lateral-baixo small'
        )
        .textContent =
        t.totalCarrinho;




      /* BANNER */


      document
        .querySelector(
          '.banner h2'
        )
        .innerHTML =
        t.bannerTitulo;




      document
        .querySelector(
          '.banner p'
        )
        .textContent =
        t.bannerTexto;




      /* DESTAQUES */


      document
        .querySelector(
          '#inicio .secao h2'
        )
        .textContent =
        t.destaques;




      document
        .querySelector(
          '#inicio .etiqueta'
        )
        .textContent =
        t.maisPedidos;




      /* CARRINHO */


      document
        .querySelector(
          '.voltar'
        )
        .textContent =
        t.voltar;




      document
        .querySelector(
          '#carrinho .secao h2'
        )
        .textContent =
        t.carrinho;




      document
        .getElementById(
          'textoTudo'
        )
        .textContent =
        t.tudo;




      document
        .querySelector(
          '.resumo h2'
        )
        .textContent =
        t.resumo;




      document
        .querySelectorAll(
          '.linha-resumo span'
        )[0]
        .textContent =
        t.subtotal;




      document
        .querySelectorAll(
          '.linha-total span'
        )[0]
        .textContent =
        t.total;




      document
        .querySelector(
          '.pagar'
        )
        .textContent =
        t.pagar;




      /* BOTÃO DE IDIOMA */


      document
        .querySelector(
          '#botaoIdioma span'
        )
        .textContent =
        t.botaoIdioma;




      /* PAGAMENTO */


      document
        .getElementById(
          'tituloPagamento'
        )
        .textContent =
        t.tituloPagamento;




      document
        .getElementById(
          'textoPagamento'
        )
        .textContent =
        t.textoPagamento;




      document
        .querySelector(
          '.botao-fechar-pagamento'
        )
        .textContent =
        t.fechar;




      /* NOMES DOS PRODUTOS */


      const ids = [


        'finiursinho',


        'fini_beijinho_15g',


        'finitubes',


        'fini_dentadura_15g',


        'fini_banana_15g',


        'pacoca'


      ];




      document
        .querySelectorAll(
          '#inicio .produto'
        )
        .forEach(
          (produto, index) => {




            const id =
              ids[index];




            if (id) {


              produto
                .querySelector('h3')
                .textContent =
                nomesProdutos[
                idiomaAtual
                ][id];


            }


          }
        );




      atualizar();


    }




    /* =========================
       ALTERNAR IDIOMA
    ========================= */


    function alternarIdioma() {




      idiomaAtual =


        idiomaAtual === 'pt'
          ? 'en'
          : 'pt';




      aplicarTraducao();




      if (


        document
          .getElementById('carrinho')
          .classList
          .contains('ativa')


      ) {


        mostrarCarrinho();


      }


    }




    /* =========================
       FECHAR MODAL CLICANDO FORA
    ========================= */


    document
      .getElementById(
        'modalPagamento'
      )
      .addEventListener(
        'click',
        function (event) {




          if (
            event.target === this
          ) {


            fecharPagamento();


          }


        }
      );




    /* =========================
       INICIAR
    ========================= */


    mostrarCarrinho();


    atualizar();


    aplicarTraducao();




    document
      .getElementById(
        'botaoIdioma'
      )
      .style.display =
      'flex';




  </script>

</body>

</html>