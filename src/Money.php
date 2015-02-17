<?php
/**
 *	Class money
 */

class Money
{
	private $_amount;

	public function __construct($amount)
	{
		$this->_amount = $amount;
	}

	public function getAmount()
	{
		return $this->_amount;
	}

	public function negate()
	{
		return new Money(-1 * $this->_amount);
	}
}