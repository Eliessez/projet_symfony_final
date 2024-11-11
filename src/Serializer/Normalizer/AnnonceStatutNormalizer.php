<?php

namespace App\Serializer\Normalizer;

use App\Enum\AnnonceStatut;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AnnonceStatutNormalizer implements NormalizerInterface
{
    public function __construct(
        #[Autowire(service: 'serializer.normalizer.object')]
        private NormalizerInterface $normalizer
    ) {
    }

    public function normalize($object, ?string $format = null, array $context = []): string|int|bool|array|null
    {
        if ($object instanceof AnnonceStatut) {
            return $object->value;
        }

        return $this->normalizer->normalize($object, $format, $context);
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof AnnonceStatut;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            AnnonceStatut::class => true,
        ];
    }
}