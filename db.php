class DbConnection
{
    protected $conn = null;
    public function OpenCon()
    {
        $this->conn = new mysqli("localhost:3306", "root", "vasco2202", "universidademais") or die($conn->connect_error);
        return $this->conn;
    }
    public function CloseCon()
    {
        $this->conn->close();
    }
}