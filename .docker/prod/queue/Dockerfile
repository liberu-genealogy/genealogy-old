# Build arguments
ARG IMAGE_REGISTRY=prod
ARG IMAGE_TAG=latest

# Image
FROM ${IMAGE_REGISTRY}/genealogy:${IMAGE_TAG}

# Set up the working directory
WORKDIR /var/www/html

# Run the queue service
CMD ["php", "artisan", "queue:work", "--tries=3", "--sleep=3"]
