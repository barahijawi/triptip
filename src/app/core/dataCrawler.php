<?php
//namespace triptip\src\app\core\dataCrawler;
class dataCrawler
{
    private $data;
    private $providerType;
    public function __construct($providerParam = [], $typeParam = 'json')
    {
        $this->data = $providerParam;
        $this->providerType = $typeParam;
        $this->init();
    }

    public function getBoardings()
    {
        return $this->data;
    }
    private function init()
    {
        switch ($this->providerType) {
            case 'json':
                $this->data = json_decode($this->data, true);
                break;
            case 'xml':
                //do xml stuff
                break;
            case 'array':
                //do nothing since we need it array for now
                break;
            case 'string':
                $this->data = explode($this->data, ','); //eg.'"departuer":"bus",...'depends on how the string fortmat
            default:
                //keep it array;
        }
    }

    private function getStartAndDestination()
    {
        
        for ($i = 0, $max = count($this->data); $i < $max; $i++) {
            $isDestination = true;
            $isStart = true;
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->data as $index => $val) {
                // If current trip departure is another trip arrivel, then we have a previous trip
                if (strcasecmp($this->data[$i]['Departure'], $val['Arrival']) == 0) {
                    $isStart = false;
                }
                // If current trip arrival is another trip departure, then it is not the last trip
                elseif (strcasecmp($this->data[$i]['Arrival'], $val['Departure']) == 0) {
                    $isDestination = false;
                }
            }
            // Assign the last and the first trip
            if ($isStart) {
                //echo('start ==> '.$this->data[$i]['Departure'].'<br/>');
                // It is the first trip so we put it on the top
                array_unshift($this->data, $this->data[$i]);
                unset($this->data[$i]);
            } elseif ($isDestination) {
                //echo('finish ==> '.$this->data[$i]['Arrival'].'<br/>');
                // It is the last trip so we put it at the bottom
                array_push($this->data, $this->data[$i]);
                unset($this->data[$i]);
            }
        }
        $this->data = array_merge($this->data);
        //var_dump($this->data);
    }

    public function pathOrder()
    {
        // Get first and last trip
        $this->getStartAndDestination();
        // Now we pair boardings
        for ($i = 0, $max = count($this->data) - 1; $i < $max; $i++) {
            // Foreach trip we test for the arrival city and the departure city
            foreach ($this->data as $index => $trip) {
                if (strcasecmp($this->data[$i]['Arrival'], $trip['Departure']) == 0) {
                    $nextIndex = $i + 1;
                    $tempTicket = $this->data[$nextIndex];
                    $this->data[$nextIndex] = $trip;
                    $this->data[$index] = $tempTicket;
                }
            }
        }
    }

}
