<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<style>
body {
  background-color: #FFFFFF;
}
svg {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -250px;
  margin-left: -400px;
}
.message-box {
  height: 200px;
  width: 380px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -100px;
  margin-left: 50px;
  color: #000;
  font-family: Roboto;
  font-weight: 300;
}
.message-box h1 {
  font-size: 60px;
  line-height: 46px;
  margin-bottom: 40px;
}
.buttons-con .action-link-wrap {
  margin-top: 40px;
}
.buttons-con .action-link-wrap a {
  background: #ADD8E6;
  padding: 8px 25px;
  border-radius: 4px;
  color: #000;
  font-weight: bold;
  font-size: 14px;
  transition: all .3s linear;
  cursor: pointer;
  text-decoration: none;
  margin-right:10px
}
.buttons-con .action-link-wrap a:hover {
    background:#5A5C6C; 
    color:#fff
}
.buttons-con .action-link-wrap a {
    display: block;
    margin-bottom: 10px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #ADD8E6;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 4px; /* Adiciona bordas arredondadas ao dropdown */
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #5A5C6C; color:#fff}

.dropdown:hover .dropdown-content {display: block;}

/* Adiciona estilos ao botão dropdown */
.dropbtn {
  background-color: #ADD8E6;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 4px; /* Adiciona bordas arredondadas ao botão */
}

/* Muda a cor de fundo do botão quando o mouse está sobre ele */
.dropbtn:hover, .dropbtn:focus {
  background-color: #5A5C6C;
}



#Polygon-1 , #Polygon-2 , #Polygon-3 , #Polygon-4 , #Polygon-4, #Polygon-5 {
    stroke:#ADD8E6; 
    animation: float .75s infinite ease-in-out alternate
}
#Polygon-2 {
    animation-delay:.2s
}
#Polygon-3 {
    animation-delay:.4s
}
#Polygon-4 {
    animation-delay:.6s
}
#Polygon-5 {
    animation-delay:.8s
}

@keyframes float {
	100% {transform:translateY(20px)}
}
@media (max-width:450px) {
    svg {position:absolute; top:50%; left:50%; margin-top:-250px; margin-left:-190px}
    .message-box {top:50%; left:50%; margin-top:-100px; margin-left:-190px; text-align:center}
}



</style>

</script>

<svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
    </g>
</svg>
<div class="message-box">
  <h1>Projeto LAB</h1>
  <p>Sistema de reconhecimento do mérito estudantil</p>
  <div class="buttons-con">
    <div class="action-link-wrap">
      <div class="dropdown">
        <button class="dropbtn">Login</button>
        <div class="dropdown-content">
          <a href="{{ route('login_empresa') }}">Empresas</a>
          <a href="{{ route('login_professor') }}">Professores</a>
          <a href="{{ route('login_aluno') }}">Alunos</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Cadastre-se</button>
        <div class="dropdown-content">
          <a href="{{ route('alunos.cadastro') }}">Alunos</a>
          <a href="{{ route('empresas.cadastro') }}">Empresas</a>
        </div>
      </div>
    </div>
  </div>
</div>



</html>


