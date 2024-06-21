FROM ruby:3.0

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libsqlite3-dev \
    sqlite3 \
    nodejs \
    npm \
    git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Clone BeEF repository
RUN git clone https://github.com/beefproject/beef.git /opt/beef

WORKDIR /opt/beef

# Set the TERM environment variable
ENV TERM xterm

# Install Bundler
RUN gem install bundler

# Install BeEF dependencies step-by-step
RUN bundle install && npm install

# Copy the updated config.yaml to the correct directory

COPY config.yaml /opt/beef/config.yaml
# Expose the default BeEF port
EXPOSE 3000

CMD ["./beef"]
