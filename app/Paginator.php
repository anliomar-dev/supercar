<?php

namespace app;

use PDO;

class Paginator
{
    private PDO $db;
    private int $perPage;
    private int $currentPage;
    private string $query;

    public function __construct(PDO $db, string $query, int $perPage = 10, int $currentPage = 1){
        $this->db = $db;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
        $this->query = $query;
    }

    /**
     * Retrieves the paginated results from the specified query.
     *
     * @return ?array The result set as an associative array, or null if no results are found.
     */
    public function getResults(): ?array{
        $offset = ($this->currentPage - 1) * $this->perPage;
        $paginatedQuery = $this->query . " LIMIT :limit OFFSET :offset";
        $statement = $this->db->prepare($paginatedQuery);
        $statement->bindValue(':limit', $this->perPage, \PDO::PARAM_INT);
        $statement->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Gets the total number of rows from the query.
     *
     * @return ?int The total number of rows, or null if the query returns no rows.
     */
    public function getTotalRows(): ?int{
        $queryCount = "SELECT COUNT(*) FROM ($this->query) AS total";
        $statement = $this->db->prepare($queryCount);
        $statement->execute();
        return $statement->fetchColumn();
    }

    /**
     * Calculates the total number of pages based on the total rows and rows per page.
     *
     * @return ?int The total number of pages, or null if there are no rows.
     */
    public function getTotalPage(): ?int{
        return ceil($this->getTotalRows() / $this->perPage);
    }

    /**
     * Returns an array containing the paginated data and pagination information.
     *
     * @return ?array An array containing the paginated data, total rows, current page, rows per page, and total pages.
     */
    public function getPaginationData(): ?array {
        return [
            "data" => $this->getResults(),
            "total_rows" => $this->getTotalRows(),
            "current_page" => $this->currentPage,
            "per_page" => $this->perPage,
            "total_page" => $this->getTotalPage()
        ];
    }
}
