<?php

//namespace src\app\core\Transportation\Plane;

/**
 * Class Plane
 *
 * @package src\Transportation
 */
class Plane extends AbstractTransportation
{

    /**
     * @var string
     */
    protected $transportationNumber;

    /**
     * @var string
     */
    protected $seat;

    /**
     * @var string
     */
    protected $gate;

    /**
     * @var string
     */
    protected $baggage;

    const MESSAGE = 'From %s, take flight %s to %s. Gate %s, seat %s.';
    const MESSAGE_BAGGAGE_TICKET = 'Baggage drop at ticket counter %s.<br/>';
    const MESSAGE_NO_BAGGAGE_TICKET =
        'Baggage will we automatically transferred from your last leg.<br/>';

    /**
     * Return a message for the trip, defined in TransportationInterface
     *
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(static::MESSAGE, $this->departure, $this->
            transportationNumber, $this->arrival, $this->gate, $this->seat);

        // Add Baggage message
        if (!empty($this->baggage)) {
            $message .= sprintf(PHP_EOL . '   ' . static::MESSAGE_BAGGAGE_TICKET, $this->
                baggage);

            return $message;
        }

        // We don't have bagage
        $message .= PHP_EOL . '   ' . static::MESSAGE_NO_BAGGAGE_TICKET;

        return $message;
    }
}
