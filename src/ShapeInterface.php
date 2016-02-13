<?php

namespace Shapes;

interface ShapeInterface {

	/**
	 * Get the area
	 *
	 * @return int
	 */
	public function area();

	/**
	 * Get the perimeter
	 * NOTE: For a circle/sphere this is also known as circumference
	 *
	 * @return int
	 */
	public function perimeter();

    public function volume();
}
