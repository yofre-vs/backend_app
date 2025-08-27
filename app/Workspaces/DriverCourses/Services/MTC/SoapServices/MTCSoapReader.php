<?php 
namespace App\Domains\Citv\Services\MTC\SoapServices;
class MTCSoapReader
{
    protected static \DOMDocument $dom;
    protected static \DOMXPath $xpath;

    public static function read(string $xml, string $tipoDeServicio): array
    {
        self::$dom = new \DOMDocument();
        self::$dom->loadXML($xml);

        self::$xpath = new \DOMXPath(self::$dom);
        self::registerCommonNamespaces(); 
        switch ($tipoDeServicio) {
            case 'sessionOpen':
                return self::parseAutentificaInicioOperacion();
            case 'ValidaResultadoInspeccion':
                return self::parseValidaResultadoInspeccion();
            // Agrega más casos según los servicios
            default:
                throw new \Exception("Servicio no soportado: $tipoDeServicio");
        }
    }

    protected static function registerCommonNamespaces(): void
    {
        self::$xpath->registerNamespace('s', 'http://schemas.xmlsoap.org/soap/envelope/');
        self::$xpath->registerNamespace('t', 'http://tempuri.org/');
        self::$xpath->registerNamespace('a', 'http://schemas.datacontract.org/2004/07/MTC.ServiciosCITV.Dominio.Entidades');
    }

    protected static function getValue(string $xpathQuery): ?string
    {
        $nodes = self::$xpath->query($xpathQuery);
        return $nodes->length > 0 ? $nodes->item(0)->nodeValue : null;
    }

    protected static function parseAutentificaInicioOperacion(): array
    {
        return [
            'code' => self::getValue('//a:Codigo'),
            'message' => self::getValue('//a:Mensaje'),
            'retVal' => self::getValue('//a:RetVal'),
        ];
    }

    protected static function parseValidaResultadoInspeccion(): array
    {
        return [
            'resultado' => self::getValue('//a:Resultado'),
            'observaciones' => self::getValue('//a:Observaciones'),
        ];
    }
}
