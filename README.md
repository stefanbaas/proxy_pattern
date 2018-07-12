###Proxy pattern vragen

####Wat is het verschil tussen het Decorator - en Proxy pattern
Het ‘Decorator Pattern’ richt zich meer op het dynamisch toevoegen van functies aan een object, en het ‘Proxy Pattern’ richt zich meer op het regelen van de toegang tot een object.

####Wat is het doel van het Proxy pattern?
Het doel van het Proxy pattern is dat het kan communiceren met een bron. Zoals bijvoorbeeld een netwerkverbinding, iets in het geheugen, een bestand of andere bron. De proxy is een klasse die functioneert als een interface naar iets anders. Een proxy is een extra laag tussen de client en het originele object. Je roept dus niet direct het originele object aan, dit regeld de proxy. Een proxy is hetzelfde in gebruik als het originele object omdat het gebruikmaakt van dezelfde interface.

####Van het Proxy pattern wordt vaak gezegd dat het een onzichtbare Boundary is, wat wordt daarmee bedoeld?
Proxies zijn onzichtbaar voor de gebruiker, dus het gebruik van proxies heeft geen invloed op de gebruiker. En een proxy is hetzelfde in gebruik als het originele object.

####Omschrijf hoe het Proxy pattern lazy initialisation kan toepassen en wat het voordeel is
Bij ‘lazy initialisation’ stel je de creatie van een object, de berekening van een waarde of een ander duur proces uit, tot de eerste keer dat het echt nodig is. Zo gebruik je hiervoor pas geheugen zodra het echt nodig is, zo houd je je applicatie sneller.

####Noem 3 varianten op het Proxy pattern en de toepassing van elke variant
Remote Proxy:
Remote Proxy's worden gebruikt bij het communicatie tussen externe objecten.

Virtual Proxy:
Virtual Proxy's worden gebruikt om de prestaties te optimaliseren.

Protection Proxy:
Protection Proxy’s worden gebruikt bij de beveiliging van een object.

####Omschrijf de werking en het belang van copy-on-write -proxies
Bij ‘copy-on-write’ maak je een kopie van een object zonder dat daar extra geheugen voor in gebruik wordt genomen. Zodra het object wijzigt gaat het pas extra geheugen kosten. Dus als de kopie niet wijzigt kost het ook geen extra geheugen.

####Geef een voorbeeld van een SPL class waarbij een proxy gebruikt kan worden en geef aan wat het voordeel daarvan is

<?php
Interface ImageInterface {
    public function getSize();
    public function displayImage();
}

Class Image implements ImageInterface
{
    protected $image;

    public function __construct($path)
    {
        $this->image = imagecreatefromjpeg($path);
    }

    public function getSize()
    {
        return [
            imagesx($this->image),
            imagesy($this->image)
        ];
    }

    public function displayImage()
    {
        return imagepng($this->image);
    }
}

Class ImageProxy implements ImageInterface
{
    protected $path;
    protected $image;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getSize()
    {
        $this->init();
        return $this->image->getSize();
    }

    public function displayImage()
    {
        $this->init();
        return $this->image->displayImage();
    }

    private function init(){
        if(!$this->image) {
            $this->image = new Image($this->path);
        }
    }
}

$img1 = new ImageProxy('img/kat.jpg');
echo memory_get_usage()."<br/>";
$img2 = new ImageProxy('img/titanic.jpg');
echo memory_get_usage()."<br/>";
$size1 = $img1->getSize();
echo memory_get_usage()."<br/>";
$size2 = $img2->getSize();
echo memory_get_usage()."<br/>";
echo $img1->displayImage();
echo memory_get_usage()."<br/>";
$img2->displayImage();
echo memory_get_usage()."<br/>";

Bij het voorbeeld hierboven wordt bij het aanmaken van een extra object geen extra geheugen gebruikt, zodra je een functie van het object aanroept wordt er pas extra geheugen gebruikt.

