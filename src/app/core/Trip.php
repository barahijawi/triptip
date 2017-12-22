<?php
//namespace triptip\src\app\core\Trip;
/**
 * Class Trip
 *
 * @package Triptip
 */
class Trip
{
    /**
     * Boardings
     *
     * @var array
     */
    protected $boardings = array();

    /**
     * Sorted boardings
     *
     * @var array
     */
    protected $sortedBoardings = array();

    /**
     * Default set of transportation
     *
     * @var array
     */
    protected static $transportations = array(
        'Train' => 'Train',
        'Bus' => 'Bus',
        'Plane' => 'Plane',
        );

    function __construct($boardings)
    {
        $this->boardings = $boardings;
    }

  
    /**
     * Sort boardings
     * This function sorts the boardings in order
     */
    public function sort()
    {
        // Create BoardingSorter instance to sort data
        $boardingSorter = new dataCrawler($this->boardings);
        // Sort boardings and assign them to the sorted boardings array
        $boardingSorter->pathOrder();
        $this->sortedBoardings = $boardingSorter->getBoardings();
    }

    /**
     * Get sorted transportations as an array of objects
     *
     * @return array
     */
    public function getTransportations()
    {
        $transportationList = array();

        if (count($this->sortedBoardings) == 0) {
            return $transportationList;
        }

        foreach ($this->sortedBoardings as $boarding) {
            $type = $boarding['Transportation'];

            if (!isset(static::$transportations[$type])) {
                throw new RuntimeException(sprintf('Unsupported transportation : %s', $type));
            }
            $transportationList[] = new static::$transportations[$type]($boarding);
        }

        //var_dump($transportationList);
        return $transportationList;

    }

    /**
     * Display Trip
     */
    public function tripString()
    {
        foreach ($this->getTransportations() as $index => $transportaton) {
            // var_dump($transportaton);
            echo ($index + 1) . ". " . $transportaton->getMessage() . PHP_EOL . PHP_EOL;
            // Final dstination message
            if ($index == (count($this->sortedBoardings) - 1)) {
                echo ($index + 2) . ". " . $transportaton::MESSAGE_FINAL_DESTINATION . PHP_EOL;
            }
        }

    }

    /**
     * Get boardings
     *
     * @return array()
     */
    public function getBoardings()
    {
        return $this->boardings;
    }

    /**
     * Get sorted boardings
     *
     * @return array()
     */
    public function getSortedBoardings()
    {
        return $this->sortedBoardings;
    }
}
