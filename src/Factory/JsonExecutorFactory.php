<?php
namespace Graviton\JsonCommandBundle\Factory;

use JMS\Serializer\SerializerInterface;
use Graviton\JsonCommand\Executor\JsonCommandExecutor;

/**
 * Factory
 */
class JsonExecutorFactory
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Controller
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Create JSON executor
     *
     * @param string $executablePath Executable path (eg "php", "node")
     * @param string $resultType Result type will be passed to "deserialize" as type (eg. "array<string>")
     * @param array $commandPrefixes Fixed command arguments (eg ["--verbose", "--no-interactive"])
     * @param array $environmentVariables Environment variables (eg ["TZ" => "UTC"])
     * @return JsonCommandExecutor
     */
    public function createJsonExecutor(
        $executablePath,
        $resultType,
        array $commandPrefixes = [],
        array $environmentVariables = []
    )
    {
        $command = new JsonCommandExecutor($executablePath, $this->serializer, $resultType);
        foreach ($commandPrefixes as $prefix) {
            $command->addCommandPrefix($prefix);
        }
        foreach ($environmentVariables as $name => $value) {
            $command->addEnvironmentVariable($name, $value);
        }
        return $command;
    }
}
