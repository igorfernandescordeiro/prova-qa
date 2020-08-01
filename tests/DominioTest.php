<?php
    // use App\Dominio;
    require('src\Dominio.php');
    use PHPUnit\Framework\TestCase;
    

    class DominioTest extends TestCase
    {

        public function testDominioVazio(){
            $dominio = new Dominio("");
            $this->assertTrue($dominio->validaDominioVazio());
        }

       
        public function testRetiraEspacos() {
            $dominio = new Dominio("Retira Espacos");
            $this->assertEquals("RetiraEspacos", $dominio->retiraEspacos());  
    }

        public function testComUmCaracter() {
            $dominio = new Dominio("a");
            $this->assertFalse($dominio->minimoCaracteres());   
    }

        public function testComDoisCaracteres() {
            $dominio = new Dominio("aa");
            $this->assertTrue($dominio->minimoCaracteres());   
    }


        public function testUltrapassaMaximoCaracteres() {
            $dominio = new Dominio("aaaaaaaaaaaaaaaaaaaaaaaaaaa");
            $this->assertFalse($dominio->maximoCaracteres()); 
    }

        public function testAteMaximoCaracteres() {
            $dominio = new Dominio("aaaaaaaaaaaaaaaaaaaaaaaaaa");
            $this->assertTrue($dominio->maximoCaracteres()); 
    }



        public function testSomenteNumerosString() {
            $dominio = new Dominio("1234");
            $this->assertFalse($dominio->somenteNumeros());
    }

        public function testSomenteNumeros() {
            $dominio = new Dominio(1234);
            $this->assertFalse($dominio->somenteNumeros());
}

        public function testNumerosLetras() {
            $dominio = new Dominio("123abc");
            $this->assertTrue($dominio->somenteNumeros());
}

        
        public function testJaExisteDominioRegistrado() {
            $dominio = new Dominio("kinghost.com.br");
            $this->assertFalse($dominio->verificarDominioRegistrado());
    }

        public function testNaoExisteDominioRegistrado() {
            $dominio = new Dominio("salvadorba.com.br");
            $this->assertTrue($dominio->verificarDominioRegistrado());
    }

    
        public function testNaoIniciarComHifen(){
            $dominio = new Dominio("king-host");
            $this->assertTrue($dominio->verificarInicioHifen());
    }
        public function testIniciarComHifen(){
            $dominio = new Dominio("-kinghost");
            $this->assertFalse($dominio->verificarInicioHifen());
    }

        public function testNaoTerminarComHifen(){
            $dominio = new Dominio("king-host");
            $this->assertTrue($dominio->verificarFimHifen());
    }
        public function testTerminarComHifen(){
            $dominio = new Dominio("kinghost-");
            $this->assertFalse($dominio->verificarFimHifen());
    }

        
    }
    

?>