<?php
// Set strict types
declare(strict_types=1);

class Game {

    private ?int $ID;
    private string $Naam;
    private string $Developer;
    private string $Genre;
    private ?string $URL;
    private ?string $Afbeelding;

    /**
     * @param int|null $ID
     * @param string $Naam
     * @param string $Developer
     * @param string $Genre
     * @param string|null $URL
     * @param string|null $Afbeelding
     */
    public function __construct(?int $ID, string $Naam, string $Developer, string $Genre, ?string $URL, ?string $Afbeelding)
    {
        $this->ID = $ID;
        $this->Naam = $Naam;
        $this->Developer = $Developer;
        $this->Genre = $Genre;
        $this->URL = $URL;
        $this->Afbeelding = $Afbeelding;
    }

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    public function getNaam(): string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): void
    {
        $this->Naam = $Naam;
    }

    public function getDeveloper(): string
    {
        return $this->Developer;
    }

    public function setDeveloper(string $Developer): void
    {
        $this->Developer = $Developer;
    }

    public function getGenre(): string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): void
    {
        $this->Genre = $Genre;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(?string $URL): void
    {
        $this->URL = $URL;
    }

    public function getAfbeelding(): ?string
    {
        return $this->Afbeelding;
    }

    public function setAfbeelding(?string $Afbeelding): void
    {
        $this->Afbeelding = $Afbeelding;
    }

    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Game[] Een array van Game-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM Game");

        // Array om games op te slaan
        $games = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $game = new Game(
                $row['ID'],
                $row['Naam'],
                $row['Developer'],
                $row['Genre'],
                $row['URL'],
                $row['Afbeelding']
            );
            $games[] = $game;
        }

        // Retourneer array met games
        return $games;
    }

}
