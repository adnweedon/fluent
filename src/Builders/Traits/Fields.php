<?php

namespace LaravelDoctrine\Fluent\Builders\Traits;

use Doctrine\DBAL\Types\Type;
use LaravelDoctrine\Fluent\Buildable;
use LaravelDoctrine\Fluent\Builders\Field;

trait Fields
{
    /**
     * @param string        $type
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function field($type, $name, callable $callback = null)
    {
        $field = Field::make($this->getBuilder(), $type, $name);

        $this->callbackAndQueue($field, $callback);

        return $field;
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function string($name, callable $callback = null)
    {
        return $this->field(Type::STRING, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function text($name, callable $callback = null)
    {
        return $this->field(Type::TEXT, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function integer($name, callable $callback = null)
    {
        return $this->field(Type::INTEGER, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function smallInteger($name, callable $callback = null)
    {
        return $this->field(Type::SMALLINT, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function bigInteger($name, callable $callback = null)
    {
        return $this->field(Type::BIGINT, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function guid($name, callable $callback = null)
    {
        return $this->field(Type::GUID, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function blob($name, callable $callback = null)
    {
        return $this->field(Type::BLOB, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function object($name, callable $callback = null)
    {
        return $this->field(Type::OBJECT, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function float($name, callable $callback = null)
    {
        return $this->field(Type::FLOAT, $name, $callback)->precision(8)->scale(2);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function decimal($name, callable $callback = null)
    {
        return $this->field(Type::DECIMAL, $name, $callback)->precision(8)->scale(2);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function boolean($name, callable $callback = null)
    {
        return $this->field(Type::BOOLEAN, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function simpleArray($name, callable $callback = null)
    {
        return $this->field(Type::SIMPLE_ARRAY, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function jsonArray($name, callable $callback = null)
    {
        return $this->field(Type::JSON_ARRAY, $name, $callback);
    }

    /**
     * @param string        $name
     * @param callable|null $callback
     *
     * @return Field
     */
    public function binary($name, callable $callback = null)
    {
        return $this->field(Type::BINARY, $name, $callback)->nullable();
    }

    /**
     * @return \Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder
     */
    abstract public function getBuilder();

    /**
     * @param Buildable     $buildable
     * @param callable|null $callback
     */
    abstract protected function callbackAndQueue(Buildable $buildable, callable $callback = null);
}
